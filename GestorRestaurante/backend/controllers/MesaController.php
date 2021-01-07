<?php

namespace backend\controllers;

use common\models\PedidoSearch;
use Yii;
use common\models\Mesa;
use common\models\MesaSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Mesa models.
     * @return mixed
     */
    public function actionIndex()
    {
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
    }

    /**
     * Displays a single Mesa model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
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
    }

    /**
     * Creates a new Mesa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $novaMesa = new Mesa();

        if ($novaMesa->load(Yii::$app->request->post()) && $novaMesa->save()) {
            return $this->redirect(['view', 'id' => $novaMesa->id]);
        }

        return $this->render('create', [
            'novaMesa' => $novaMesa,
        ]);
    }

    /**
     * Updates an existing Mesa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $mesa = $this->findModel($id);

        $searchModel = new MesaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $mesa->estado=2;
        $dataProvider->pagination = ['pageSize' => 5];

        if ($mesa->load(Yii::$app->request->post()) && $mesa->save()) {
            return $this->redirect(['view', 'id' => $mesa->id]);
        }

        return $this->render('update', [
            'mesa' => $mesa,
        ]);
    }

    /**
     * Deletes an existing Mesa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $mesa=Mesa::findOne($id);

        if($mesa->estado!=2){
            Yii::$app->getSession()->setFlash('danger', [
                'type' => 'danger',
                'duration' => 5000,
                'icon' => 'fas fa-times',
                'message' => 'Impossivel excluir a mesa, encontra se Reservada ou Ocupada',
                'title' => 'ALERTA',
                'positonX' => 'right',
                'positonY' => 'top'
            ]);
            return $this->redirect(['index']);

        }

        Yii::$app->getSession()->setFlash('success', [
            'type' => 'success',
            'duration' => 5000,
            'icon' => 'fas fa-check',
            'message' => 'Mesa excluida com sucesso',
            'title' => 'ALERTA',
            'positonX' => 'right',
            'positonY' => 'top'
        ]);
        $mesa->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Mesa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mesa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mesa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
