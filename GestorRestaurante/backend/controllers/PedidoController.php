<?php

namespace backend\controllers;

use backend\models\Mesa;
use common\models\CategoriaProduto;
use common\models\MesaSearch;
use common\models\Pedido1passoForm;
use common\models\Pedido2passoForm;
use common\models\PedidoProduto;
use common\models\PedidoRestauranteForm;
use common\models\PedidoTakeawayForm;
use common\models\Perfil;
use common\models\Produto;
use common\models\ProdutoCategoriaProduto;
use common\models\ProdutoSearch;
use common\models\User;
use phpDocumentor\Reflection\Types\Integer;
use Yii;
use common\models\Pedido;
use common\models\PedidoSearch;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PedidoController implements the CRUD actions for Pedido model.
 */
class PedidoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','update','delete','view','criar1passo','criar2passo','criar3passo'],
                        'allow' => true,
                        'roles' => ['gerente'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST']
                ],
            ],
        ];
    }

    /**
     * Lists all Pedido models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PedidoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $mesas = ArrayHelper::map(Mesa::find()->all(),'id','id');


        $dataProvider->pagination = ['pageSize' => 5];

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'mesas' => $mesas
        ]);
    }

    /**
     * Displays a single Pedido model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCriar2passo($tipo)
    {
        $searchModel = new MesaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $pedido = new Pedido();

        $id_user = Yii::$app->user->identity->getId();
        $perfil = Perfil::findOne($id_user);;
        $pedido->id_perfil = $perfil->id_user;
        $pedido->estado = 0;
        $pedido->tipo=$tipo;
        $pedido->id_mesa=2;

        if ($pedido->tipo==0) {

            $pedido->scenario = 'scenariorestaurante';
        }else{

            $pedido->scenario = 'scenariotakeaway';

        }

        if ($pedido->load(Yii::$app->request->post())) {

            var_dump($pedido->id_mesa);
            die();

            return $this->redirect(['/pedidoproduto/index','id'=>$pedido->id]);

        }

        return $this->render('passo2', [
            'pedido'=>$pedido,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);

    }

    public function lertipo(){
        return (Integer)Yii::$app->request->post('tipo');
    }

    public function actionCriar3passo($id)
    {
        $pedido=Pedido::findOne($id);

        if($pedido->tipo == 0){
            $pedido->scenario='scenariorestaurante';
            if ($pedido->load(Yii::$app->request->post()) && $pedido->save()) {

                $this->redirect('index');

            }
            return $this->render('3_passo', [
                'pedido'=>$pedido
            ]);
        }else{
            $pedido->scenario='scenariotakeaway';
            if ($pedido->load(Yii::$app->request->post()) && $pedido->save()) {

                $this->redirect('index');

            }
            return $this->render('3_passo', [
                'pedido'=>$pedido
            ]);
        }

    }

    /**
     * Updates an existing Pedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $pedido = $this->findModel($id);

        $items_pedido=$pedido->getPedidoProdutos();

        if ($pedido->load(Yii::$app->request->post()) && $pedido->save()) {
            return $this->redirect(['view', 'id' => $pedido->id]);
        }

        return $this->render('update', [
            'pedido' => $pedido,
            'items_pedido'=>$items_pedido
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionPedidorestaurante($id){

        $searchModel = new MesaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $model = new PedidoRestauranteForm();
        $pedido=$this->findModel($id);

        $model->id_pedido=$pedido->id;

        if ($model->load(Yii::$app->request->post()) && $model->restaurante()) {

           return $this->redirect(['index']);
        }

        return $this->render('pedidorestaurante', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);

    }
    public function actionPedidotakeaway($id){

        $model = new PedidoTakeawayForm();
        $pedido=$this->findModel($id);

        $model->id_pedido=$pedido->id;

        if ($model->load(Yii::$app->request->post()) && $model->takeaway()) {

            return $this->redirect(['view', 'id' => $pedido->id]);
        }

        return $this->render('pedidotakeaway', [
            'model' => $model,
        ]);

    }


    protected function findModel($id)
    {
        if (($model = Pedido::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
