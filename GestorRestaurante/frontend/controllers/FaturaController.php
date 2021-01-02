<?php

namespace frontend\controllers;

use common\models\Pedido;
use common\models\PedidoProduto;
use Yii;
use common\models\Fatura;
use common\models\FaturaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FaturaController implements the CRUD actions for Fatura model.
 */
class FaturaController extends Controller
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
     * Lists all Fatura models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $pedido=Pedido::findOne($id);

        $items_pedido=PedidoProduto::findAll(['id_pedido'=>$pedido->id]);
        $model=new Fatura();
        $model->id_pedido=$pedido->id;
        $model->valor=PedidoProduto::find()->where(['id_pedido'=>$id])->sum('preco');


        $fatura=Fatura::findOne($pedido->id);


        if ($model->load(Yii::$app->request->post())) {

            if($fatura!=null){
                $this->findModel($fatura->id)->delete();
            }
            if($model->save()){

                return $this->redirect(['index', 'id' => $model->id_pedido]);

            }
        }

        return $this->render('index', [
            'model' => $model,
            'fatura' => $fatura,
            'items_pedido' => $items_pedido,
        ]);
    }

    /**
     * Displays a single Fatura model.
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
     * Creates a new Fatura model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $pedido=Pedido::findOne($id);

        $fatura = new Fatura();

        $fatura->id_pedido=$pedido->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Fatura model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Fatura model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Fatura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Fatura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fatura::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
