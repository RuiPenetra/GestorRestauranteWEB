<?php

namespace backend\controllers;

use common\models\CategoriaProduto;
use common\models\ProdutoCategoriaProduto;
use common\models\ProdutoForm;
use common\models\ProdutoSearch;
use phpDocumentor\Reflection\Types\Integer;
use Yii;
use common\models\Produto;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProdutoController implements the CRUD actions for Produto model.
 */
class ProdutoController extends Controller
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
                        'actions' => ['index','view','create','update','delete'],
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
        if (Yii::$app->user->can('consultarProdutos')) {

            $categorias = ArrayHelper::map(CategoriaProduto::find()->all(),'id','nome');

            $searchModel = new ProdutoSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $dataProvider->pagination = ['pageSize' => 10];


            return $this->render('index', [
                'searchModel'=>$searchModel,
                'dataProvider'=>$dataProvider,
                'categorias'=>$categorias
            ]);

        }else{

            return $this->render('site/error');
        }

    }

    public function actionView($id)
    {
        if (Yii::$app->user->can('consultarProdutos')) {


            return $this->render('index', [
                'produtoSelecionado' => $this->findModel($id),
            ]);

        }else{

            return $this->render('site/error');
        }
    }

    public function actionCreate()
    {
        if (Yii::$app->user->can('criarProdutos')) {

            $produto=new Produto();
            $produto->estado=0;

            $categorias = ArrayHelper::map(CategoriaProduto::find()->all(),'id','nome');


            if ($produto->load(Yii::$app->request->post()) && $produto->save()) {

                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => 'Produto criado com sucesso',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);

                return $this->redirect(['index']);

            }

            return $this->render('create', [
                'categorias' => $categorias,
                'produto' => $produto
            ]);

        }else{

            return $this->render('site/error');
        }

    }

    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('atualizarProdutos')) {

            $produto=$this->findModel($id);

            $categorias = ArrayHelper::map(CategoriaProduto::find()->all(),'id','nome');

            if ($produto->load(Yii::$app->request->post()) && $produto->save()) {

                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => 'Produto atualizado com sucesso',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);

                return $this->redirect(['index']);

            }

            return $this->render('update', [
                'categorias' => $categorias,
                'produto' => $produto
            ]);

        }else{

            return $this->render('site/error');
        }
    }

    public function actionDelete($id)
    {
        if (Yii::$app->user->can('apagarProdutos')) {

            $produto=$this->findModel($id);

            if($produto->estado!=0){
                $produto->estado=0;
                $produto->save();

                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => 'Produto disponivel com sucesso',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);
            }else{
                $produto->estado=1;
                $produto->save();

                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => 'Produto indisponivel com sucesso',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);
            }

            return $this->redirect(['index']);

        }else{

            return $this->render('site/error');
        }
    }

    protected function findModel($id)
    {
        if (($model = Produto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
