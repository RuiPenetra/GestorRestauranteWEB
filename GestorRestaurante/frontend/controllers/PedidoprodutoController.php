<?php

namespace frontend\controllers;

use common\models\CategoriaProduto;
use common\models\Mesa;
use common\models\MesaSearch;
use common\models\Pedido;
use common\models\PedidoprodutoSearch;
use common\models\PerfilSearch;
use common\models\ProdutoSearch;
use Yii;
use common\models\Pedidoproduto;
use yii\base\Model;
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
                        'actions' => ['index','create'],
                        'allow' => true,
                        'roles' => ['cliente'],
                    ],
                    [
                        'actions' => ['index','create','update','atendedorpedidosupdate','delete','view'],
                        'allow' => true,
                        'roles' => ['atendedorPedidos'],
                    ],
                    [
                        'actions' => ['index','create','update','cozinhaupdate','delete','view'],
                        'allow' => true,
                        'roles' => ['cozinheiro'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['empregadoMesa'],
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
        $pedidoProduto->quant_Preparacao=0;
        $categorias = ArrayHelper::map(CategoriaProduto::find()->all(),'id','nome');
        $searchProduto= new ProdutoSearch();
        $searchProduto->estado=0;
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
            $this->ValidarEstadoPedido($model->id_pedido);

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

            $resultado = $this->ValidarQuantidadeItemProduto($model);

            if ($resultado != null) {

                Yii::$app->getSession()->setFlash('danger', [
                    'type' => 'danger',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => $resultado,
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);

            } else {

                $model->save();

                $this->ValidarEstadoItemProduto($model->id);

                $this->ValidarEstadoPedido($model->id_pedido);

                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => 'Produto pedido atualizado com sucesso',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);

                return $this->redirect(['index', 'id' => $model->id_pedido]);

            }
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

    public function actionAtendedorpedidosupdate($id){
        $model=$this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $resultado = $this->ValidarQuantidadeItemProduto($model);

            if ($resultado != null) {

                Yii::$app->getSession()->setFlash('danger', [
                    'type' => 'danger',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => $resultado,
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);

            } else {
                $model->save();

                $this->ValidarEstadoItemProduto($model->id);

                $this->ValidarEstadoPedido($model->id_pedido);

                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => 'Produto pedido atualizado com sucesso',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);

                return $this->redirect(['index', 'id' => $model->id_pedido]);

            }
        }

        return $this->render("updateatendedorpedidos", [
                'itemPedido'=>$model,
            ]);
    }
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
    public function ValidarEstadoItemProduto($id)
    {

        $itemPedido=$this->findModel($id);

        if($itemPedido->quant_Preparacao ==0 && $itemPedido->quant_Entregue==0){

            $itemPedido->estado=0; //Processo
        }

        if($itemPedido->quant_Preparacao !=0){

            $itemPedido->estado=1; //Preparação
        }
        if($itemPedido->quant_Entregue == $itemPedido->quant_Pedida){

            $itemPedido->estado=2; //Entregue
            $itemPedido->quant_Preparacao=0;
        }
        $itemPedido->save();
    }

    public function ValidarQuantidadeItemProduto($itemPedido){

        if($itemPedido->quant_Preparacao>$itemPedido->quant_Pedida && $itemPedido->quant_Entregue>$itemPedido->quant_Pedida){

            $messagem="Quantidade Entregue e em Preparação não podem ser maiores que a quantidade pedida";

        }elseif($itemPedido->quant_Preparacao>$itemPedido->quant_Pedida){

            $messagem="Quantidade em Preparação não pode ser maior que a quantidade pedida";

        }elseif ($itemPedido->quant_Entregue>$itemPedido->quant_Pedida){

            $messagem="Quantidade Entregue não podem ser maior que a quantidade pedida";

        }else{
                $messagem=null;
            }

        return $messagem;
    }

    public function ValidarEstadoPedido($id_pedido)
    {
        //Pedido::find()->where(['id_perfil'=>$id_user])->andWhere(['estado'=>[0,1]])->all();

        $pedido=Pedido::findOne($id_pedido);

        $itemsPedido=PedidoProduto::findAll(['id_pedido'=>$id_pedido , 'estado'=>[1,2]]);

        if($itemsPedido!=null){

            $pedido->estado=1;
        }else{
            $pedido->estado=0;
        }

        $pedido->save();
    }
    protected function findModel($id)
    {
        if (($model = Pedidoproduto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}