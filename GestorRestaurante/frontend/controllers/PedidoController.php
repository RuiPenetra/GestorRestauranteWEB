<?php

namespace frontend\controllers;


use Codeception\Lib\Connector\Yii2;
use common\models\Mesa;
use common\models\MesaSearch;
use common\models\PedidoProduto;
use common\models\Perfil;
use common\models\PerfilSearch;
use kartik\datetime\DateTimePicker;
use Yii;
use common\models\Pedido;
use common\models\PedidoSearch;
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
                        'actions' => ['index','create','delete','update'],
                        'allow' => true,
                        'roles' => ['cliente'],
                    ],

                    [
                        'actions' => ['index','view','create','update','delete'],
                        'allow' => true,
                        'roles' => ['atendedorPedidos'],
                    ],
                    [
                        'actions' => ['index','view'],
                        'allow' => true,
                        'roles' => ['cozinheiro','empregadoMesa'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
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
        if (\Yii::$app->user->can('consultarPedidos') || \Yii::$app->user->can('consultarTakeaway')){
            $id = Yii::$app->user->identity->id;

        $searchModel = new PedidoSearch();
        if(\Yii::$app->user->can('consultarTakeaway')){
            $searchModel->id_perfil = $id;
        }


        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $mesas = ArrayHelper::map(Mesa::find()->all(),'id','id');


            $dataProvider->pagination = ['pageSize' => 6];

            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'mesas' => $mesas

        ]);
        }else{
            return $this->render('/site/error',[
               'name'=>'name'
            ]);

        }
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

    /**
     * Creates a new Pedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($tipo)
    {
        if (\Yii::$app->user->can('criarTakeaway') || \Yii::$app->user->can('criarPedidos')){

            $id_user = Yii::$app->user->identity->getId();

                $searchMesa = new MesaSearch();
                $searchMesa->estado = 2;
                $dataProviderMesa = $searchMesa->search(Yii::$app->request->queryParams);
                $dataProviderMesa->pagination = ['pageSize' => 5];

                $pedido = new Pedido();
                $pedido->estado = 1;
                $pedido->tipo = $tipo;

                $pedido->id_perfil = $id_user;
                $pedido->data = date('Y-m-d H:i:s');

                $searchUser = new PerfilSearch();
                $searchUser->cargo = 'empregadoMesa';
                $dataProviderUser = $searchUser->search(Yii::$app->request->queryParams);

                $dataProviderUser->pagination = ['pageSize' => 5];

                if ($pedido->tipo == 0) {

                    $pedido->scenario = 'scenariorestaurante';
                } else {

                    $pedido->scenario = 'scenariotakeaway';

                }


                if ($pedido->load(Yii::$app->request->post()) && $pedido->save()) {

                    if ($pedido->mesa != null) {
                        $mesa = Mesa::findOne($pedido->id_mesa);
                        $mesa->estado = 1;
                        $mesa->save();
                    }
                    return $this->redirect(['/pedidoproduto/index', 'id' => $pedido->id]);

                }

                return $this->render('create', [
                    'pedido' => $pedido,
                    'searchMesa' => $searchMesa,
                    'dataProviderMesa' => $dataProviderMesa,
                    'searchUser' => $searchUser,
                    'dataProviderUser' => $dataProviderUser
                ]);

        }
        else{
                return $this->render('/site/error',[
                    'name'=>'name'
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
        if (\Yii::$app->user->can('atualizarTakeaway') || \Yii::$app->user->can('atualizarPedidos')) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
        else{
            return $this->render('/site/error',[
                'name'=>'name'
            ]);
        }
    }

    /**
     * Deletes an existing Pedido model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (\Yii::$app->user->can('apagarTakeaway') || \Yii::$app->user->can('apagarPedidos')) {
            $pedido = Pedido::findOne($id);
            if ($pedido->estado == 1) {


                PedidoProduto::deleteAll(['id_pedido' => $id]);

                $pedido->delete();
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => 'Pedido apagado com sucesso',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);
            } else {
                Yii::$app->getSession()->setFlash('danger', [
                    'type' => 'danger',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => 'Não é possivel apagar o pedido pois encontra-se em preparação/concluido',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);
            }
        }else{
            return $this->render('/site/error',[
                'name'=>'name'
            ]);
            }



        return $this->redirect(['index']);
    }

    /**
     * Finds the Pedido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pedido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pedido::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
