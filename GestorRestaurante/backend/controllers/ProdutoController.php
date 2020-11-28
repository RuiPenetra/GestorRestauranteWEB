<?php

namespace backend\controllers;

use common\models\CategoriaProduto;
use common\models\ProdutoCategoriaProduto;
use common\models\ProdutoForm;
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

            $produto=Produto::findOne(183);

           var_dump($produto->produtoCategoriaProdutos);
           die();
            $categoria_produto_categoria=ProdutoCategoriaProduto::find()->all();

            $categorias = ArrayHelper::map(CategoriaProduto::find()
                ->where(['categoria' => 'Entrada'])
                ->orWhere(['categoria' => 'Sopa'])
                ->orWhere(['categoria' => 'Carne'])
                ->orWhere(['categoria' => 'Peixe'])
                ->orWhere(['categoria' => 'Sobremesa'])
                ->orWhere(['categoria' => 'Bebida'])
                ->orderBy('categoria')
                ->all(),'id','categoria');

            return $this->render('index', [
                'categoria_produto_categoria'=>$categoria_produto_categoria
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

            $produto=new ProdutoForm();

            $categorias = ArrayHelper::map(CategoriaProduto::find()
                ->where(['categoria' => 'Entrada'])
                ->orWhere(['categoria' => 'Sopa'])
                ->orWhere(['categoria' => 'Carne'])
                ->orWhere(['categoria' => 'Peixe'])
                ->orWhere(['categoria' => 'Sobremesa'])
                ->orWhere(['categoria' => 'Bebida'])
                ->orderBy('categoria')
                ->all(),'id','categoria');


            if ($produto->load(Yii::$app->request->post()) && $produto->produto()) {

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

    /**
     * Updates an existing Produto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('atualizarProdutos')) {

            $model=$this->findModel($id);
            $categoria=ProdutoCategoriaProduto::findOne($id);

            $categorias = ArrayHelper::map(CategoriaProduto::find()
                ->where(['categoria' => 'Entrada'])
                ->orWhere(['categoria' => 'Sopa'])
                ->orWhere(['categoria' => 'Carne'])
                ->orWhere(['categoria' => 'Peixe'])
                ->orWhere(['categoria' => 'Sobremesa'])
                ->orWhere(['categoria' => 'Bebida'])
                ->orderBy('categoria')
                ->all(),'id','categoria');


            if ($produto->load(Yii::$app->request->post()) && $produto->produto()) {

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

    /**
     * Deletes an existing Produto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
//        ProdutoCategoriaProduto::findAll(array("condition"=>"id_produto =  $id"))->delete();

        $produto = Produto::findOne($id);

        $produto_categorias=$produto->getProdutoCategoriaProdutos();

        ProdutoCategoriaProduto::deleteAll(['id_produto' => $produto->id]);
      /*  if($produto_categorias!=null){

            foreach ($produto_categorias as $item ){


            }

        }*/
        Yii::$app->getSession()->setFlash('success', [
            'type' => 'success',
            'duration' => 5000,
            'icon' => 'fas fa-tags',
            'message' => 'Produto apagado com sucesso',
            'title' => 'ALERTA',
            'positonX' => 'right',
            'positonY' => 'top'
        ]);

        $this->findModel($id)->delete();

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
