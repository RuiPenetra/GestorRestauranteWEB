<?php

namespace backend\controllers;

use common\models\Mesa;
use Codeception\Util\Debug;
use common\models\CategoriaProduto;
use common\models\MesaSearch;
use common\models\Pedido1passoForm;
use common\models\Pedido2passoForm;
use common\models\PedidoProduto;
use common\models\PedidoRestauranteForm;
use common\models\PedidoTakeawayForm;
use common\models\Perfil;
use common\models\PerfilSearch;
use common\models\Produto;
use common\models\ProdutoCategoriaProduto;
use common\models\ProdutoSearch;
use common\models\User;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Yaml\Dumper;
use Yii;
use common\models\Pedido;
use common\models\PedidoSearch;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;
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
                        'actions' => ['index','create','update','delete','view'],
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

    public function actionCreate($tipo)
    {
        $searchMesa = new MesaSearch();
        $searchMesa->estado=2;
        $dataProviderMesa = $searchMesa->search(Yii::$app->request->queryParams);
        $dataProviderMesa->pagination = ['pageSize' => 5];

        $pedido = new Pedido();

        $id_user = Yii::$app->user->identity->getId();
        $pedido->estado = 0;
        $pedido->tipo=$tipo;

        $searchUser= new PerfilSearch();
        $searchUser->cargo='empregadoMesa';
        $dataProviderUser = $searchUser->search(Yii::$app->request->queryParams);

        $dataProviderUser->pagination = ['pageSize' => 5];

        if ($pedido->tipo==0) {

            $pedido->scenario = 'scenariorestaurante';
        }else{

            $pedido->scenario = 'scenariotakeaway';

        }

        if ($pedido->load(Yii::$app->request->post()) && $pedido->save()) {

            if($pedido->mesa!=null) {
                $mesa = Mesa::findOne($pedido->id_mesa);
                $mesa->estado = 1;
                $mesa->save();
            }
                return $this->redirect(['/pedidoproduto/index','id'=>$pedido->id]);

        }

        return $this->render('create', [
            'pedido'=>$pedido,
            'searchMesa' => $searchMesa,
            'dataProviderMesa' => $dataProviderMesa,
            'searchUser' => $searchUser,
            'dataProviderUser' => $dataProviderUser
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

    public function actionUpdate($id)
    {
        $pedido = $this->findModel($id);

        $searchModel = new MesaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($pedido->load(Yii::$app->request->post()) && $pedido->save()) {
            return $this->redirect(['view', 'id' => $pedido->id]);
        }

        return $this->render('update', [
            'pedido' => $pedido,
            'dataProvider'=>$dataProvider
        ]);
    }

    public function actionDelete($id)
    {
        $pedido=$this->findModel($id);

        if($pedido->estado==0){

            if($pedido->tipo==0) {
                $mesa = Mesa::findOne($pedido->id_mesa);
                $mesa->estado = 2;
                $mesa->save();
            }

            $pedido->delete();
            Yii::$app->getSession()->setFlash('success', [
                'type' => 'success',
                'duration' => 5000,
                'icon' => 'fas fa-tags',
                'message' => 'Pedido eliminado com sucesso',
                'title' => 'ALERTA',
                'positonX' => 'right',
                'positonY' => 'top'
            ]);

        }else{
            Yii::$app->getSession()->setFlash('danger', [
                'type' => 'danger',
                'duration' => 5000,
                'icon' => 'fas fa-tags',
                'message' => 'Não é possivel eliminar o pedido, porque se encontra em processo/concluido',
                'title' => 'ALERTA',
                'positonX' => 'right',
                'positonY' => 'top'
            ]);

        }
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Pedido::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
