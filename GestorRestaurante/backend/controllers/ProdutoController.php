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
                        'actions' => ['index','update','delete','view','create'],
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
     * Lists all Produto models.
     * @return mixed
     */
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

    /**
     * Displays a single Produto model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
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

    /**
     * Creates a new Produto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
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

        $produto=$this->findModel($id);

        $produto->estado=1;
        $produto->save();

        Yii::$app->getSession()->setFlash('success', [
            'type' => 'success',
            'duration' => 5000,
            'icon' => 'fas fa-tags',
            'message' => 'Produto inativado com sucesso',
            'title' => 'ALERTA',
            'positonX' => 'right',
            'positonY' => 'top'
        ]);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Produto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Produto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Produto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
