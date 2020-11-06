<?php

namespace backend\controllers;

use common\models\User;
use Yii;
use common\models\Perfil;
use common\models\PerfilSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PerfilController implements the CRUD actions for Perfil model.
 */
class PerfilController extends Controller
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
                        'actions' => ['index','create','myperfil'],
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
     * Lists all Perfil models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PerfilSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMyperfil($id)
    {
        $user =User::findOne($id);
        $perfil= $this->findModel($user->id);
        $auth = Yii::$app->authManager;

        $user->cargo=$this->actionGetcargo($user->id);


        $user->password_atual=$user->password_hash;


        if ($user->load(Yii::$app->request->post()) && $user->save() && $perfil->load(Yii::$app->request->post()) && $perfil->save()) {

            VarDumper::dump($user->cargo);


            $this->actionRemovecargo($user->cargo,$user->id);
            $cargo=$user->cargo;
            $novoCargo = $auth->getRole($cargo);
            $auth->assign($novoCargo, $user->id);


            if($user->new_password != null ){
                $user->updatePassword($user->new_password);
            }


            return $this->redirect(['myperfil', 'id' => $user->id]);
        }

        return $this->render('perfil', [
            'perfil' =>$perfil,
            'user' =>$user,
        ]);
    }
    /**
     * Displays a single Perfil model.
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
     * Creates a new Perfil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Perfil();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_user]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Perfil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_user]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Perfil model.
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
     * Finds the Perfil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Perfil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Perfil::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionGetcargo($id_user){


        if(Yii::$app->authManager->getAssignment('gerente',$id_user) != null){

            return $cargo="gerente";
        }else if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id_user) != null){

            return $cargo="atendedorPedidos";
        }else if(Yii::$app->authManager->getAssignment('empregadoMesa',$id_user) != null){

            return $cargo="empregadoMesa";
        }else if(Yii::$app->authManager->getAssignment('cozinheiro',$id_user) != null){

            return $cargo="cozinheiro";
        }else{

            return $cargo="cliente";
        }

    }
}
