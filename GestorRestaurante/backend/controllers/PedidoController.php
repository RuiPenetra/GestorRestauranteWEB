<?php

namespace backend\controllers;

use common\models\Mesa;
use common\models\MesaSearch;
use common\models\PedidoProduto;
use common\models\PerfilSearch;
use Yii;
use common\models\Pedido;
use common\models\PedidoSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class PedidoController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','create','update','delete'],
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

    public function actionIndex()
    {
        if (Yii::$app->user->can('consultarPedidos')) {

            $searchModel = new PedidoSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $mesas = ArrayHelper::map(Mesa::find()->all(),'id','id');


            $dataProvider->pagination = ['pageSize' => 5];

            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'mesas' => $mesas
            ]);

        }else{

            return $this->render('site/error');
        }
    }

    public function actionCreate($tipo)
    {
        if (Yii::$app->user->can('criarPedidos') && Yii::$app->user->can('consultarUtilizadores') && Yii::$app->user->can('consultarMesas')) {

            $searchMesa = new MesaSearch();
            $searchMesa->estado=2;
            $dataProviderMesa = $searchMesa->search(Yii::$app->request->queryParams);
            $dataProviderMesa->pagination = ['pageSize' => 5];

            $pedido = new Pedido();
            $pedido->estado = 1;
            $pedido->tipo=$tipo;

            $searchUser= new PerfilSearch();


            if ($pedido->tipo==0) {

                $pedido->scenario = 'scenariorestaurante';
                $searchUser->cargo="empreagadoMesa";
            }else{

                $pedido->scenario = 'scenariotakeaway';
                $searchUser->cargo="cliente";
            }
            $dataProviderUser = $searchUser->search(Yii::$app->request->queryParams);
            $dataProviderUser->pagination = ['pageSize' => 5];

            if ($pedido->load(Yii::$app->request->post()) && $pedido->save()) {

                    if($pedido->mesa!=null) {
                        $mesa = Mesa::findOne($pedido->id_mesa);
                        $mesa->estado = 1;
                        $mesa->save();
                    }
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => 'Pedido criado com sucesso',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);

                    return $this->redirect(['/pedidoproduto/index','id'=>$pedido->id]);

            }

            return $this->render('create', [
                'pedido'=>$pedido,
                'searchMesa' => $searchMesa,
                'dataProviderMesa' => $dataProviderMesa,
                'searchUser' => $searchUser,
                'dataProviderUser' => $dataProviderUser
            ]);

        }else{

            return $this->render('site/error');
        }

    }

    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('atualizarPedidos') && Yii::$app->user->can('consultarUtilizadores')&& Yii::$app->user->can('consultarMesas')) {

            $pedido=$this->findModel($id);
            $mesa_antiga=$pedido->id_mesa;
            $searchMesa = new MesaSearch();
            $dataProviderMesa = $searchMesa->search(Yii::$app->request->queryParams);
            $dataProviderMesa->pagination = ['pageSize' => 5];
            $searchUser= new PerfilSearch();
            $dataProviderUser = $searchUser->search(Yii::$app->request->queryParams);

            $dataProviderUser->pagination = ['pageSize' => 5];


            if ($pedido->load(Yii::$app->request->post()) && $pedido->save()) {

                if($pedido->tipo==0 && $pedido->id_mesa!=$mesa_antiga){

                    $mesa_antiga = Mesa::findOne($mesa_antiga);
                    $mesa_antiga->estado=2;
                    $mesa_antiga->save();

                    $mesa_nova=Mesa::findOne($pedido->id_mesa);
                    $mesa_nova->estado=1;
                    $mesa_nova->save();

                }

                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => 'Pedido atualizado com sucesso',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);

                return $this->redirect(['/pedidoproduto/index','id'=>$pedido->id]);

            }

            return $this->render('update', [
                'pedido'=>$pedido,
                'searchMesa' => $searchMesa,
                'dataProviderMesa' => $dataProviderMesa,
                'searchUser' => $searchUser,
                'dataProviderUser' => $dataProviderUser
            ]);
        }else{

            return $this->render('site/error');
        }
    }

    public function actionDelete($id)
    {
        if (Yii::$app->user->can('apagarPedidos')) {

            $pedido=$this->findModel($id);

            if($pedido->estado==1){

                if($pedido->tipo==0) {
                    $mesa = Mesa::findOne($pedido->id_mesa);
                    $mesa->estado = 2;
                    $mesa->save();
                }

                PedidoProduto::deleteAll(['id_pedido' => $id]);
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
                    'message' => 'Não é possivel eliminar o pedido, porque se encontra em preparação/concluido',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);

            }
            return $this->redirect(['index']);

        }else{

            return $this->render('site/error');
        }
    }

    protected function findModel($id)
    {
        if (($model = Pedido::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
