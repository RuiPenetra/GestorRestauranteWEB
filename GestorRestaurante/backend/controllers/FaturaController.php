<?php

namespace backend\controllers;

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
        $fatura=Fatura::findOne(['id_pedido'=>$id]);
        $items_pedido=PedidoProduto::findAll(['id_pedido'=>$fatura->id_pedido]);

        return $this->render('view', [
            'fatura' => $fatura,
            'items_pedido' => $items_pedido,
        ]);
    }

    /**
     * Creates a new Fatura model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {

        $erro=$this->ValidarPedido($id);

        $fatura=Fatura::findOne(['id_pedido'=>$id]);

        if($fatura!=null){

            return $this->redirect(['view', 'id' => $fatura->id_pedido]);
        }

        if($erro!=null){

            Yii::$app->getSession()->setFlash('danger', [
                'type' => 'danger',
                'duration' => 5000,
                'icon' => 'fas fa-tags',
                'message' => $erro,
                'title' => 'ALERTA',
                'positonX' => 'right',
                'positonY' => 'top'
            ]);

            return $this->redirect(['/pedidoproduto/index','id'=>$id]);

        }

            $fatura = new Fatura();
            $fatura->id_pedido=$id;
            $fatura->valor=PedidoProduto::find()->where(['id_pedido'=>$id])->sum('preco');

            if ($fatura->load(Yii::$app->request->post()) && $fatura->save()) {

                $pedido=Pedido::findOne($fatura->id_pedido);

                $pedido->estado=2;
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
        $fatura = $this->findModel($id);

        if ($fatura->load(Yii::$app->request->post()) && $fatura->save()) {
            return $this->redirect(['view', 'id' => $fatura->id_pedido]);
        }

        return $this->render('update', [
            'fatura' => $fatura,
        ]);
    }


    public function actionDelete($id)
    {

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

    protected function findModel($id)
    {
        if (($model = Fatura::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
