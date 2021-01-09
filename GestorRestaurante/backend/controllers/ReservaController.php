<?php

namespace backend\controllers;

use common\models\Mesa;
use common\models\MesaSearch;
use common\models\Pedido;
use common\models\PerfilSearch;
use Yii;
use common\models\Reserva;
use common\models\ReservaSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReservaController implements the CRUD actions for Reserva model.
 */
class ReservaController extends Controller
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
                        'actions' => ['index','create','update','delete'],
                        'allow' => true,
                        'roles' => ['gerente'],
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

    public function actionIndex()
    {
        if (Yii::$app->user->can('consultarReservas')) {

            $searchModel = new ReservaSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{

            return $this->render('site/error');
        }
    }

    public function actionCreate()
    {
        if (Yii::$app->user->can('criarReservas') && Yii::$app->user->can('consultarUtilizadores') && Yii::$app->user->can('consultarMesas')) {

            $reserva = new Reserva();
            $searchMesa = new MesaSearch();
            $searchMesa->estado=2;
            $dataProviderMesa = $searchMesa->search(Yii::$app->request->queryParams);
            $dataProviderMesa->pagination = ['pageSize' => 5];

            $searchUser= new PerfilSearch();
            $dataProviderUser = $searchUser->search(Yii::$app->request->queryParams);
            $dataProviderUser->pagination = ['pageSize' => 5];

            if ($reserva->load(Yii::$app->request->post()) && $reserva->save()) {

                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => 'Reserva criada com sucesso',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);

                return $this->redirect(['view', 'id' => $reserva->id]);
            }

            return $this->render('create', [
                'reserva'=>$reserva,
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
        if (Yii::$app->user->can('atualizarReservas') && Yii::$app->user->can('consultarUtilizadores') && Yii::$app->user->can('consultarMesas')) {

            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{

            return $this->render('site/error');
        }
    }

    public function actionDelete($id)
    {
        if (Yii::$app->user->can('apagarReservas')) {

            $this->findModel($id)->delete();

            return $this->redirect(['index']);

        }else{

            return $this->render('site/error');
        }
    }

    protected function findModel($id)
    {
        if (($model = Reserva::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
