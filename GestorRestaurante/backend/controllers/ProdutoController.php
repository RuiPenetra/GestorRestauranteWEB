<?php

namespace backend\controllers;

use backend\models\CategoriaProduto;
use backend\models\ProdutoCategoriaProduto;
use Yii;
use common\models\Produto;
use common\models\ProdutoSearch;
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
        $produtos=Produto::find()->all();
        $categorias=CategoriaProduto::find()->all();
        $produto_categoria= new ProdutoCategoriaProduto();
        $model = new Produto();


        if ($model->load(Yii::$app->request->post())) {
            //var_dump(Yii::$app->request->post());
           //$model->preco = floatval($model->preco);
            $model->preco= (double)$model->preco;
            /*var_dump(Yii::$app->request->post());
            die();*/
            var_dump($model);

            $model->save();
            $produto_categoria->id_produto=$model->id;
            $produto_categoria->save();

            Yii::$app->getSession()->setFlash('success', [
                'type' => 'success',
                'duration' => 5000,
                'icon' => 'fas fa-tags',
                'message' => 'Produto criado com sucesso',
                'title' => 'ALERTA',
                'positonX' => 'right',
                'positonY' => 'top'
            ]);

            $this->redirect(['index']);
        }

        return $this->render('index', [
            'produtos' => $produtos,
            'categorias' => $categorias,
            'model' => $model,
            'produto_categoria'=>$produto_categoria
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
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Produto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
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
