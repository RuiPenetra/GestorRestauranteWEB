<?php

namespace backend\controllers;

use common\models\Mesa;
use common\models\Pedido;
use common\models\PedidoProduto;
use function Composer\Autoload\includeFile;
use Dompdf\Dompdf;
use kartik\mpdf\Pdf;
use Mpdf\Mpdf;
use setasign\Fpdi\FpdfTpl;
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
                        'actions' => ['view','create','update','delete','export'],
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

    public function actionView($id)
    {
        if (Yii::$app->user->can('consultarFaturas')) {

            $fatura=Fatura::findOne(['id_pedido'=>$id]);
            $items_pedido=PedidoProduto::findAll(['id_pedido'=>$fatura->id_pedido]);

            return $this->render('view', [
                'fatura' => $fatura,
                'items_pedido' => $items_pedido,
            ]);

        }else{

            return $this->render('site/error');
        }
    }

    public function actionCreate($id)
    {
        if (Yii::$app->user->can('criarFaturas')) {

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
                    $pedido->estado=3;
                    $pedido->save();

                    if($pedido->tipo!=1){

                        $mesa=Mesa::findOne($pedido->id_mesa);
                        $mesa->estado=2;
                        $mesa->save();
                    }



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
        }else{

            return $this->render('site/error');
        }
    }

    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('atualizarFaturas')) {

            $fatura = $this->findModel($id);

            if ($fatura->load(Yii::$app->request->post()) && $fatura->save()) {

                $pedido=Pedido::findOne($fatura->id_pedido);
                if($pedido->tipo!=1){

                    $mesa=Mesa::findOne($pedido->id_mesa);
                    $mesa->estado=2;
                    $mesa->save();
                }

                return $this->redirect(['view', 'id' => $fatura->id_pedido]);
            }

            return $this->render('update', [
                'fatura' => $fatura,
            ]);
        }else{

            return $this->render('site/error');
        }
    }

    public function actionDelete($id)
    {
        if (Yii::$app->user->can('apagarFaturas')) {

           $fatura= $this->findModel($id);

           $pedido=Pedido::findOne($fatura->id_pedido);

           if($pedido->tipo!=1){

               $mesa=Mesa::findOne($pedido->id_mesa);
               $mesa->estado=1;
               $mesa->save();
           }

           $pedido->estado=2;

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

    public function actionExport(){

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();


        $dompdf->loadHtml(include('GestorRestauranteWeb/GestorRestaurante/backend/web/index.php?r=fatura%2Findex'));

// (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portatil');

// Render the HTML as PDF
        $dompdf->render();

// Output the generated PDF to Browser
        $dompdf->stream();
        exit;

    }

    protected function ValidarPedido($id){

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
