<?php

namespace backend\controllers;

use common\models\CategoriaProduto;
use common\models\Mesa;
use common\models\MesaSearch;
use common\models\Pedido;
use common\models\PedidoprodutoSearch;
use common\models\ProdutoSearch;
use Yii;
use common\models\Pedidoproduto;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PedidoprodutoController implements the CRUD actions for Pedidoproduto model.
 */
class PedidoprodutoController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pedidoproduto models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $pedido=Pedido::findOne($id);
        $model = new Pedidoproduto();

        $model->id_pedido=$pedido->id;

        $searchModel = new PedidoprodutoSearch();
        $searchModel->id_pedido=$pedido->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'pedido'=>$pedido,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pedidoproduto model.
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
     * Creates a new Pedidoproduto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $pedido=Pedido::findOne($id);
        $pedidoProduto = new Pedidoproduto();
        $pedidoProduto->id_pedido=$pedido->id;
        $pedidoProduto->estado=0;
        $pedidoProduto->quant_Entregue=0;
        $categorias = ArrayHelper::map(CategoriaProduto::find()->all(),'id','nome');
        $searchProduto= new ProdutoSearch();
        $dataProvider = $searchProduto->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 6];



        if ($pedidoProduto->load(Yii::$app->request->post())) {

            $resultado=PedidoProduto::findOne(['id_produto'=>$pedidoProduto->id_produto]);

            if($resultado !=null){

                $resultado->quant_Pedida= $resultado->quant_Pedida + $pedidoProduto->quant_Pedida;
                $resultado->preco=$resultado->quant_Pedida * $pedidoProduto->produto->preco;

                $resultado->save();

                return $this->redirect(['index', 'id' => $pedidoProduto->id_pedido]);

            }else if($pedidoProduto->save()){

                return $this->redirect(['index', 'id' => $pedidoProduto->id_pedido]);

            }

        }

        return $this->render('create', [
            'pedidoProduto'=>$pedidoProduto,
            'categorias'=>$categorias,
            'dataProvider'=>$dataProvider,
            'searchProduto'=>$searchProduto,

        ]);
    }

    /**
     * Updates an existing Pedidoproduto model.
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
     * Deletes an existing Pedidoproduto model.
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
     * Finds the Pedidoproduto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pedidoproduto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pedidoproduto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
