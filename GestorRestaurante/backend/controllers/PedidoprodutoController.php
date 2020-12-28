<?php

namespace backend\controllers;

use common\models\CategoriaProduto;
use common\models\Mesa;
use common\models\MesaSearch;
use common\models\Pedido;
use common\models\PedidoprodutoSearch;
use common\models\Produto;
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
                        'actions' => ['index','create','update','cozinhaupdate','delete','view'],
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

            $resultado=PedidoProduto::findOne(['id_pedido'=>$pedidoProduto->id_pedido ,'id_produto'=>$pedidoProduto->id_produto]);

            if($resultado !=null){

                $resultado->quant_Pedida= $pedidoProduto->quant_Pedida;
                $resultado->preco= $pedidoProduto->quant_Pedida*$pedidoProduto->produto->preco;

                if($resultado->save()){

                    $pedido->load(Yii::$app->request->post());

                    $pedido->save();
                    return $this->redirect(['index', 'id' => $pedidoProduto->id_pedido]);

                }

            }else{
                $pedidoProduto->save();
                return $this->redirect(['index', 'id' => $pedidoProduto->id_pedido]);

            }

        }

        return $this->render('create', [
            'pedidoProduto'=>$pedidoProduto,
            'pedido'=>$pedido,
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
        $pedido=Pedido::findOne($model->id_pedido);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $pedido->load(Yii::$app->request->post());

            $pedido->save();
            return $this->redirect(['index', 'id' => $model->id_pedido]);
        }

        return $this->render('update', [
            'itemPedido' => $model,
            'pedido' => $pedido,
        ]);
    }

    public function actionCozinhaupdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $pedido=Pedido::findOne($model->id_pedido);

            if($model->quant_Entregue<$model->quant_Pedida){

                $model->estado=1;
                $model->save();
                $pedido->estado=1;
                $pedido->save();
            }elseif ($model->quant_Entregue==$model->quant_Pedida){
                $model->estado=2;
                $model->save();
                $pedido->estado=1;
                $pedido->save();
            }elseif($model->quant_Pedida==0){
                $model->estado=0;
                $model->save();
                $pedido->estado=1;
                $pedido->save();

                Yii::$app->getSession()->setFlash('danger', [
                    'type' => 'danger',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => 'Quantidade Entregue superior a quantidade pedida',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);
                return $this->render('updatecozinha', [
                    'itemPedido' => $model,
                ]);
            }
            return $this->redirect(['index', 'id' => $model->id_pedido]);
        }

        return $this->render('updatecozinha', [
            'itemPedido' => $model,
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

        $itemPedido =$this->findModel($id);

        if($itemPedido->estado!=0){
            Yii::$app->getSession()->setFlash('danger', [
                'type' => 'danger',
                'duration' => 5000,
                'icon' => 'fas fa-tags',
                'message' => 'O produto/produtos que pretende apagar já se encontra em preparação',
                'title' => 'ALERTA',
                'positonX' => 'right',
                'positonY' => 'top'
            ]);

        }else{

            $itemPedido->delete();
            Yii::$app->getSession()->setFlash('success', [
                'type' => 'success',
                'duration' => 5000,
                'icon' => 'fas fa-tags',
                'message' => 'O produto/produtos foram apagados com sucesso',
                'title' => 'ALERTA',
                'positonX' => 'right',
                'positonY' => 'top'
            ]);

        }

        return $this->redirect(['index', 'id' => $itemPedido->id_pedido]);
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
