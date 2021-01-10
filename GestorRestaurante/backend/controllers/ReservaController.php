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
use yii\helpers\ArrayHelper;
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

            $searchReserva = new ReservaSearch();
            $dataProviderReserva = $searchReserva->search(Yii::$app->request->queryParams);

            $dataProviderReserva->pagination = ['pageSize' => 5];
            $mesas = ArrayHelper::map(Mesa::find()->all(),'id','id');

            return $this->render('index', [
                'searchReserva' => $searchReserva,
                'dataProviderReserva' => $dataProviderReserva,
                'mesas' => $mesas,
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

            $reserva = $this->findModel($id);

            $searchMesa = new MesaSearch();
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
                    'message' => 'Reserva atualizada com sucesso',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);
                return $this->redirect(['index']);
            }

            return $this->render('update', [
                'reserva' => $reserva,
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
        if (Yii::$app->user->can('apagarReservas')) {

            $this->findModel($id)->delete();

            Yii::$app->getSession()->setFlash('success', [
                'type' => 'success',
                'duration' => 5000,
                'icon' => 'fas fa-tags',
                'message' => 'Reserva apagada com sucesso',
                'title' => 'ALERTA',
                'positonX' => 'right',
                'positonY' => 'top'
            ]);
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
