<?php

namespace frontend\controllers;

use common\models\Pedido;
use common\models\PedidoProduto;
use Yii;
use common\models\Fatura;
use common\models\FaturaSearch;
use yii\filters\AccessControl;
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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['view','create'],
                        'allow' => true,
                        'roles' => ['cliente'],
                    ],
                    [
                        'actions' => ['create','update','view','delete'],
                        'allow' => true,
                        'roles' => ['atendedorPedidos','empregadoMesa'],
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
     * Lists all Fatura models.
     * @return mixed
     */

    /**
     * Displays a single Fatura model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(\Yii::$app->user->can('consultarFaturas')) {
            $fatura = Fatura::findOne(['id_pedido' => $id]);
            $items_pedido = PedidoProduto::findAll(['id_pedido' => $fatura->id_pedido]);

            return $this->render('view', [
                'fatura' => $fatura,
                'items_pedido' => $items_pedido,
            ]);
        }
        else{
            return $this->render('/site/error',[
                'name'=>'name'
            ]);
        }
    }

    /**
     * Creates a new Fatura model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        if (\Yii::$app->user->can('criarFaturas')) {
            $erro = $this->ValidarPedido($id);

            $fatura = Fatura::findOne(['id_pedido' => $id]);

            if ($fatura != null) {

                return $this->redirect(['view', 'id' => $fatura->id_pedido]);
            }

            if ($erro != null) {

                Yii::$app->getSession()->setFlash('danger', [
                    'type' => 'danger',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => $erro,
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);

                return $this->redirect(['/pedidoproduto/index', 'id' => $id]);
            }


        $fatura = new Fatura();
        $fatura->id_pedido = $id;
        $fatura->valor = PedidoProduto::find()->where(['id_pedido' => $id])->sum('preco');

        if ($fatura->load(Yii::$app->request->post()) && $fatura->save()) {

            $pedido = Pedido::findOne($fatura->id_pedido);

            $pedido->estado = 2;
            $pedido->save();

            Yii::$app->getSession()->setFlash('success', [
                'type' => 'success',
                'duration' => 5000,
                'icon' => 'fas fa-tags',
                'message' => 'Fatura criada com sucesso',
                'title' => 'ALERTA',
                'positonX' => 'right',
                'positonY' => 'top'
            ]);

            return $this->redirect(['view', 'id' => $fatura->id_pedido]);
        }

    } else{
            return $this->render('/site/error',[
                'name'=>'name'
            ]);
        }
        return $this->render('create', [
            'fatura' => $fatura,
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
        if (\Yii::$app->user->can('atualizarFaturas')) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
        else{
            return $this->render('/site/error',[
                'name'=>'name'
            ]);
        }
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
        if (Yii::$app->user->can('apagarFaturas')) {

            $fatura= $this->findModel($id);

            $pedido=Pedido::findOne($fatura->id_pedido);

            $pedido->estado=1;

            $pedido->save();

            $fatura->delete();

            Yii::$app->getSession()->setFlash('success', [
                'type' => 'success',
                'duration' => 5000,
                'icon' => 'fas fa-tags',
                'message' => 'Fatura apagada com sucesso',
                'title' => 'ALERTA',
                'positonX' => 'right',
                'positonY' => 'top'
            ]);

            return $this->redirect(['/pedidoproduto/index','id'=>$pedido->id]);
        }else{

            return $this->render('site/error');
        }
    }


    public function ValidarPedido($id){

        $itemsNaoConcluidos=PedidoProduto::findAll(['id_pedido'=>$id , 'estado'=>[0,1]]);
        $todosItems=PedidoProduto::findAll(['id_pedido'=>$id]);

        if($todosItems!=null){

            if($itemsNaoConcluidos!=null){

                $erro="Não é possivel concluir o pedido e processar a respeticva fatura, com produtos em processo ou em preparação";

            }else{
                $erro=null;
            }

        }else{

            $erro="O pedido encontrase vazio";
        }

        return $erro;
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
