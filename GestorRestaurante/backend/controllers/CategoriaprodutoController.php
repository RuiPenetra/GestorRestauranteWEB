<?php

namespace backend\controllers;

use common\models\CategoriaProdutoSearch;
use common\models\CategoriaProduto;
use common\models\Produto;
use Yii;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoriaProdutoController implements the CRUD actions for CategoriaProduto model.
 */
class CategoriaprodutoController extends Controller
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


    public function actionIndex()
    {
        if (Yii::$app->user->can('consultarCategoriaProdutos')) {

            $model = new CategoriaProduto();

            $searchModel = new CategoriaProdutoSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $model->editavel=1;

            $dataProvider->pagination = ['pageSize' => 5];

            if ($model->load(Yii::$app->request->post()) && $model->save()) {

                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => 'Categoria criada com sucesso',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);
                $model->nome='';

                return $this->redirect(['index']);
            }

            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel,
                'model'=>$model,
            ]);

        }else{
            return $this->render('site/error');

        }
    }

    public function actionView($id)
    {
        if (Yii::$app->user->can('consultarCategoriaProdutos')) {

            $categoria=$this->findModel($id);
            $produtos =Produto::findAll(['id_categoria'=>$id]);


            return $this->render('view', [
                'produtos' =>  $produtos,
                'categoria' =>  $categoria
            ]);

        }else{
            return $this->render('site/error');

        }
    }

    public function actionCreate()
    {
        if (Yii::$app->user->can('consultarCategoriaProdutos') && Yii::$app->user->can('criarCategoriaProdutos')) {

            $model = new CategoriaProduto();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);

        }else{
            return $this->render('site/error');

        }
    }

    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('consultarCategoriaProdutos') && Yii::$app->user->can('atualizarCategoriaProdutos')) {

            $categoria = $this->findModel($id);
            $produtos =Produto::findAll(['id_categoria'=>$categoria->id]);

            if ($categoria->load(Yii::$app->request->post()) && $categoria->save()) {

                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-check-circle',
                    'message' => 'Categoria Produto atualizada com sucesso',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);

                return $this->redirect(['view', 'id' => $categoria->id]);
            }

            return $this->render('update', [
                'categoria' => $categoria,
                'produtos' => $produtos,
            ]);
        }else{
            return $this->render('site/error');

        }
    }

    public function actionDelete($id)
    {
        if (Yii::$app->user->can('apagarCategoriaProdutos')) {

            $categoria=$this->findModel($id);

            $produtosCategoria=Produto::findAll(['id_categoria'=>$categoria->id]);

            if($produtosCategoria!=null){

                Yii::$app->getSession()->setFlash('danger', [
                    'type' => 'danger',
                    'duration' => 5000,
                    'icon' => 'fas fa-check-circle',
                    'message' => 'Impossivel apagar categorias com produtos associados',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);
                return $this->redirect(['view','id'=>$categoria->id]);

            }else{
                $this->findModel($id)->delete();

                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-check-circle',
                    'message' => 'Categoria Produto apagada com sucesso',
                    'title' => 'ALERTA',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);

                return $this->redirect(['index']);
            }

        }else{
            return $this->render('site/error');

        }

    }

    protected function findModel($id)
    {
        if (($model = CategoriaProduto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


}
