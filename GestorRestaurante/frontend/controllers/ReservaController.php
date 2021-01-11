<?php

namespace frontend\controllers;

use common\models\Mesa;
use common\models\MesaSearch;
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
            'access'=>[
                'class'=> AccessControl::className(),
                'rules'=>[
                    [
                        'actions'=>['index','view','create','update','delete'],
                        'allow'=>true,
                        'roles'=>['atendedorPedidos'],
                    ],
                    [
                        'actions'=>['index'],
                        'allow'=>true,
                        'roles'=>['empregadoMesa'],
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
     * Lists all Reserva models.
     * @return mixed
     */
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

    /**
     * Displays a single Reserva model.
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
     * Creates a new Reserva model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $id_user = Yii::$app->user->identity->id;
        if (Yii::$app->user->can('criarReservas')) {

            $reserva = new Reserva();
            $searchMesa = new MesaSearch();
            $dataProviderMesa = $searchMesa->search(Yii::$app->request->queryParams);
            $dataProviderMesa->pagination = ['pageSize' => 5];

            $reserva->id_funcionario=$id_user;



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

                return $this->redirect(['index']);

            }

            return $this->render('create', [
                'reserva'=>$reserva,
                'searchMesa' => $searchMesa,
                'dataProviderMesa' => $dataProviderMesa,

            ]);
        }else{

            return $this->render('/site/error');
        }
    }

    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('atualizarReservas')) {
            $id_user = Yii::$app->user->identity->id;
            $reserva = $this->findModel($id);

            $searchMesa = new MesaSearch();
            $dataProviderMesa = $searchMesa->search(Yii::$app->request->queryParams);
            $dataProviderMesa->pagination = ['pageSize' => 5];

            $reserva->id_funcionario = $id_user;

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
                return $this->redirect(['index', 'id' => $reserva->id]);
            }

            return $this->render('update', [
                'reserva' => $reserva,
                'searchMesa' => $searchMesa,
                'dataProviderMesa' => $dataProviderMesa
            ]);
        }else{
            return $this->render('/site/error');
        }
    }

    /**
     * Deletes an existing Reserva model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
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
        }
        else{
            return $this->render('/site/error');
        }


        return $this->redirect(['index']);
    }

    /**
     * Finds the Reserva model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reserva the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reserva::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
