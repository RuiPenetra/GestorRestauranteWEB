<?php

namespace backend\controllers;

use common\models\Perfil;
use common\models\PerfilSearch;
use common\models\User;
use common\models\UserSearch;
use phpDocumentor\Reflection\Types\Integer;
use Yii;
use common\models\Falta;
use common\models\FaltaSearch;
use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FaltaController implements the CRUD actions for Falta model.
 */
class FaltaController extends Controller
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
     * Lists all Falta models.
     * @return mixed
     */
    public function actionIndex()
    {
        /*$searchModel = new FaltaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'users' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
        if (Yii::$app->user->can('consultarUtilizadores')) {

            $searchModel = new PerfilSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
            /*$searchModel = new UserSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);*/

            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'searchModel' => $searchModel
            ]);

        }else{

            return $this->render('site/error');
        }
    }

    /**
     * Displays a single Falta model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $falta = new Falta();
        $searchFalta = new FaltaSearch();
        $dataprovider = $searchFalta->search(Yii::$app->request->queryParams);

        $falta->id_funcionario=$id;
        $user=User::findOne($id);

        if ($falta->load(Yii::$app->request->post()) && $falta->save()) {
            return $this->redirect(['view', 'id' => $user->id]);
        }

        return $this->render('view', [
            'falta' => $falta,
            'dataprovider' => $dataprovider,
            'searchFalta' => $searchFalta,
            'user'=>$user
        ]);
    }

    /**
     * Creates a new Falta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $falta = new Falta();
        $searchFalta = new FaltaSearch();
        $dataprovider = $searchFalta->search(Yii::$app->request->queryParams);

        $falta->id_funcionario=$id;
        $user=User::findOne($id);

        if ($falta->load(Yii::$app->request->post()) && $falta->save()) {
            return $this->redirect(['view', 'id' => $user->id]);
        }

        return $this->render('view', [
            'falta' => $falta,
            'dataprovider' => $dataprovider,
            'searchFalta' => $searchFalta,
            'user'=>$user
        ]);
    }

    /**
     * Updates an existing Falta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Falta model.
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
     * Finds the Falta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Falta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Falta::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
