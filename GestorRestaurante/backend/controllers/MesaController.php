<?php

namespace backend\controllers;

use common\models\PedidoSearch;
use Yii;
use common\models\Mesa;
use common\models\MesaSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Reserva;

/**
 * MesaController implements the CRUD actions for Mesa model.
 */
class MesaController extends Controller
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
                        'actions' => ['index','view','update','delete'],
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
        if (Yii::$app->user->can('consultarMesas') && Yii::$app->user->can('criarMesas')) {

            $novaMesa = new Mesa();
            $searchModel = new MesaSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $novaMesa->estado=2;
            $dataProvider->pagination = ['pageSize' => 5];

            if ($novaMesa->load(Yii::$app->request->post()) && $novaMesa->save()) {

                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => 'Mesa criada com sucesso',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);

                return $this->redirect(['index']);
            }

            return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'novaMesa' => $novaMesa
            ]);

        }else{

            return $this->render('site/error');
        }
    }

    public function actionView($id)
    {
        if (Yii::$app->user->can('consultarMesas')) {

            $mesa=$this->findModel($id);
            $searchModel = new PedidoSearch();
            $searchModel->id_mesa=$mesa->id;
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->pagination = ['pageSize' => 5];

            return $this->render('view', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'mesa' => $mesa,
            ]);

        }else{

            return $this->render('site/error');
        }
    }

    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('atualizarMesas')) {

            $mesa = $this->findModel($id);

            $searchModel = new MesaSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            $dataProvider->pagination = ['pageSize' => 5];

            if ($mesa->load(Yii::$app->request->post()) && $mesa->save()) {
                return $this->redirect(['view', 'id' => $mesa->id]);
            }

            return $this->render('update', [
                'mesa' => $mesa,
            ]);

        }else{

            return $this->render('site/error');
        }
    }

    public function actionDelete($id)
    {
        if (Yii::$app->user->can('apagarMesas')) {

            $mesa = Mesa::findOne($id);
            $reserva = Reserva::findOne(['id_mesa'=>$mesa->id]);

            if ($mesa->estado == 1 || $reserva != null) {
                Yii::$app->getSession()->setFlash('danger', [
                    'type' => 'danger',
                    'duration' => 5000,
                    'icon' => 'fas fa-times',
                    'message' => 'Impossivel excluir a mesa, encontra-se ocupada ou tem uma reserva associada',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);
                return $this->redirect(['index']);


            }
            if ($mesa->estado == 2 ) {
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-check',
                    'message' => 'Mesa inativada com sucesso',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);

                $mesa->estado=3;
                $mesa->save();

                return $this->redirect(['index']);

            }else{
                $mesa->estado=2;
                $mesa->save();
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-check',
                    'message' => 'Mesa ativada com sucesso',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);
                return $this->redirect(['index']);

            }


        }else{

            return $this->render('site/error');
        }
    }

    protected function findModel($id)
    {
        if (($model = Mesa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
