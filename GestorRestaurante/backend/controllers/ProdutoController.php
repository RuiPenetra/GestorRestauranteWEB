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
        if (Yii::$app->user->can('consultarProdutos') && Yii::$app->user->can('criarProdutos')) {

            $produtos=Produto::find()->all();
            $categoria_produto_categoria=ProdutoCategoriaProduto::find()->all();
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

            return $this->render('index', [
                'produtos' => $produtos,
                'categorias' => $categorias,
                'produto' => $produto,
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
        if (Yii::$app->user->can('consultarProdutos')) {

            $model = new Produto();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {

                $model = new Produto();
                $categoria = new CategoriaProduto();
                $produtos=Produto::find()->all();

                return $this->render('index', [
                    'categoria' => $categoria,
                    'produtos' => $produtos,
                    'model' => $model,
                ]);
            }

            return $this->redirect(['index']);

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
        $categorias_principais = ['0'=>'Entrada', 'Sopa' => 'Sopa', 'Carne' => 'Carne', 'Peixe' => 'Peixe', 'Sobremesa' => 'Sobremesa', 'Bebida'=>'Bebida'];

        $model = $this->findModel($id);


        $produto_categoria= ProdutoCategoriaProduto::find($id);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $produto_categoria->id_produto=$model->id;
            $produto_categoria->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'categorias_principais' => $categorias_principais,
            'produto_categoria'=>$produto_categoria
        ]);
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
