<?php

namespace frontend\controllers;

use common\models\CategoriaProduto;
use Yii;
use common\models\Produto;
use common\models\ProdutoSearch;
use backend\models\mesa;
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
                        'actions' => ['index','view'],
                        'allow' => true,
                        'roles' =>['empregadoMesa','atendedorPedidos','cliente'],
                    ],
                    [
                        'actions' => ['index','view','create','update','delete'],
                        'allow' => true,
                        'roles' =>['cozinheiro'],
                    ],
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' =>['?'],
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
        $categorias = ArrayHelper::map(CategoriaProduto::find()->all(),'id','nome');
        $searchModel = new ProdutoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'categorias'=>$categorias


        ]);
    }

    /**
     * Displays a single Produto model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (\Yii::$app->user->can('consultarProdutos')||Yii::$app->user->isGuest) {
            $categorias = ArrayHelper::map(CategoriaProduto::find()->all(), 'id', 'nome');
            if (Yii::$app->user->isGuest) {
                $this->layout = 'main_principal';
            }
            return $this->render('view', [
                'produto' => $this->findModel($id),
                'categorias' => $categorias

            ]);
        }
        else{
            return $this->render('/site/error',[
                'name'=>'name'
            ]);
        }
    }

    /**
     * Creates a new Produto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (\Yii::$app->user->can('criarProdutos')) {
            $model = new Produto();
            $model->estado = 0;
            $categorias = ArrayHelper::map(CategoriaProduto::find()->all(), 'id', 'nome');
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('create', [
                'model' => $model,
                'categorias' => $categorias
            ]);
        }
        else{
            return $this->render('/site/error',[
                'name'=>'name'
            ]);
        }
    }

    /**
     * Updates an existing Produto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (\Yii::$app->user->can('atualizarProdutos')) {
            $model = $this->findModel($id);
            $categorias = ArrayHelper::map(CategoriaProduto::find()->all(), 'id', 'nome');

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
                'categorias' => $categorias
            ]);
        }
        else{
            return $this->render('/site/error',[
                'name'=>'name'
            ]);
        }
    }

    /**
     * Deletes an existing Produto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (\Yii::$app->user->can('apagarProdutos')) {
            $model = $this->findModel($id);
            $model->estado = 1;
            $model->save();
            return $this->redirect(['index']);
        }else{
            return $this->render('/site/error',[
                'name'=>'name'
            ]);
        }
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
