<?php

namespace backend\controllers;

use common\models\CategoriaProduto;
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


class PedidoprodutoController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','create','update','cozinhaupdate','delete'],
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

    public function actionIndex($id)
    {
        if (Yii::$app->user->can('consultarPedidoProduto')) {

            $pedido=Pedido::findOne($id);
            $model = new Pedidoproduto();

            $model->id_pedido=$pedido->id;

            $searchModel = new PedidoprodutoSearch();
            $searchModel->id_pedido=$pedido->id;
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $dataProvider->pagination = ['pageSize' => 5];

            return $this->render('index', [
                'pedido'=>$pedido,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        }else{

            return $this->render('site/error');
        }
    }

    public function actionCreate($id)
    {
        if (Yii::$app->user->can('criarPedidoProduto') && Yii::$app->user->can('consultarProdutos')) {

            $pedido=Pedido::findOne($id);
            $pedidoProduto = new Pedidoproduto();
            $pedidoProduto->id_pedido=$pedido->id;
            $pedidoProduto->estado=0;
            $pedidoProduto->quant_Preparacao=0;
            $pedidoProduto->quant_Entregue=0;
            $categorias = ArrayHelper::map(CategoriaProduto::find()->all(),'id','nome');
            $searchProduto= new ProdutoSearch();
            $searchProduto->estado=0;
            $dataProvider = $searchProduto->search(Yii::$app->request->queryParams);
            $dataProvider->pagination = ['pageSize' => 6];


            if ($pedidoProduto->load(Yii::$app->request->post())) {

                $resultado=PedidoProduto::findOne(['id_pedido'=>$pedidoProduto->id_pedido ,'id_produto'=>$pedidoProduto->id_produto]);

                if($resultado !=null){

                    $resultado->quant_Pedida= $resultado->quant_Pedida + $pedidoProduto->quant_Pedida;
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
        }else{

            return $this->render('site/error');
        }
    }

    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('atualizarPedidoProduto')) {

            $model = $this->findModel($id);
            $pedido=Pedido::findOne($model->id_pedido);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $pedido->load(Yii::$app->request->post());

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
                    $pedido->save();

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

            return $this->render('update', [
                'itemPedido' => $model,
                'pedido' => $pedido,
            ]);

        }else{

            return $this->render('site/error');
        }
    }

    public function actionCozinhaupdate($id)
    {
        if (Yii::$app->user->can('atualizarPedidoProduto')) {

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

        }else{

            return $this->render('site/error');
        }
    }

    public function actionDelete($id)
    {
        if (Yii::$app->user->can('apagarPedidoProduto')) {

            $itemPedido =$this->findModel($id);

            if($itemPedido->estado!=0){
                Yii::$app->getSession()->setFlash('danger', [
                    'type' => 'danger',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => 'O produto/produtos que pretende apagar já se encontra em preparação/entregues',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);

            }else{

                $itemPedido->delete();

                $this->ValidarEstadoPedido($itemPedido->id_pedido);
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
        }else{

            return $this->render('site/error');
        }
    }

    protected function ValidarEstadoItemProduto($id)
    {

        $itemPedido=$this->findModel($id);

        if($itemPedido->quant_Preparacao ==0 && $itemPedido->quant_Entregue==0){

            $itemPedido->estado=0; //Processo
        }

        if($itemPedido->quant_Preparacao !=0 || $itemPedido->quant_Entregue !=0){

            $itemPedido->estado=1; //Preparação
        }
        if($itemPedido->quant_Entregue == $itemPedido->quant_Pedida){

            $itemPedido->estado=2; //Entregue
        }

        $itemPedido->save();
    }

    protected function ValidarQuantidadeItemProduto($itemPedido){

        if($itemPedido->quant_Preparacao>$itemPedido->quant_Pedida){

            $messagem="Quantidade em Preparação não pode ser maior que a quantidade pedida";

        }elseif ($itemPedido->quant_Entregue>$itemPedido->quant_Pedida){

            $messagem="Quantidade pedida não pode ser menor que a quantidade entregue";

        }else{
            $messagem=null;
        }

        return $messagem;
    }

    protected function ValidarEstadoPedido($id_pedido)
    {
        //Pedido::find()->where(['id_perfil'=>$id_user])->andWhere(['estado'=>[0,1]])->all();

        $pedido=Pedido::findOne($id_pedido);

        $itemsPedido=PedidoProduto::findAll(['id_pedido'=>$id_pedido , 'estado'=>[1,2]]);

        if($itemsPedido!=null){

            $pedido->estado=2;
        }else{
            $pedido->estado=1;
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
