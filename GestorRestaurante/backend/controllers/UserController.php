<?php

namespace backend\controllers;

use Carbon\Carbon;
use common\models\Perfil;
use common\models\SignupForm;
use Yii;
use common\models\User;
use common\models\UserSearch;
use yii\filters\AccessControl;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public $cargo;
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
     * Lists all User models.
     * @return mixed~
    */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goBack();
    }
    public function actionIndex()
    {
        $users = User::find()->all();
        /*$searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);*/

        return $this->render('index', [
            'users' => $users
            /*'searchModel' => $searchModel,
$            'dataProvider' => dataProvider,*/
        ]);
    }

    /**
     * Displays a single User model.
     *
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $user=$this->findModel($id);

        $id_user=$user->id;

        $perfil=Perfil::findOne($id_user);

        return $this->render('view', [
            'user' => $user,
            'perfil' => $perfil
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }


        $model->createAt = date('Y-m-d H:i:s');
        $model->updateAt=date('Y-m-d H:i:s');


        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionUpdate($id)
    {
        $user = $this->findModel($id);

        $perfil=Perfil::findOne($id);
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


            return $this->redirect(['view', 'id' => $user->id]);
        }

        return $this->render('update', [
            'user' => $user, 'perfil' =>$perfil
        ]);
    }

    public function actionMyperfil($id)
    {
        $user = $this->findModel($id);

        $perfil=Perfil::findOne($id);
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


            return $this->render('update', [
                'user' => $user, 'perfil' =>$perfil
            ]);
        }

        return $this->render('update', [
            'user' => $user, 'perfil' =>$perfil
        ]);
    }
    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUpdatecargo($cargo_novo,$id_user){

        $auth = Yii::$app->authManager;
        $novoCargo = $auth->getRole($cargo_novo);
        $auth->assign($novoCargo, $id_user);


    }


    public function actionRemovecargo($cargo,$id_user){

        $auth = Yii::$app->authManager;
        $cargo_remover = $auth->getRole($cargo);
        $rest= Yii::$app->authManager->revokeAll($id_user);


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
