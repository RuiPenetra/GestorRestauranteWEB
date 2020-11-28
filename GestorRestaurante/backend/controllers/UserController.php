<?php

namespace backend\controllers;

use Carbon\Carbon;
use common\models\Perfil;
use common\models\PerfilSearch;
use common\models\SignupForm;
use common\models\UserForm;
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

    public function actionIndex()
    {
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

    public function actionView($id)
    {
        if (Yii::$app->user->can('consultarUtilizadores') && Yii::$app->user->can('consultarUtilizadores') ) {

            $user=$this->findModel($id);

            $id_user=$user->id;

            $perfil=Perfil::findOne($id_user);

            return $this->render('view', [
                'user' => $user,
                'perfil' => $perfil
            ]);

        }else{

            return $this->render('site/error');
        }
    }

    public function actionCreate()
    {
        if (Yii::$app->user->can('criarUtilizadores') && Yii::$app->user->can('criarPerfis') ) {

            $model = new SignupForm();
            if ($model->load(Yii::$app->request->post()) && $model->signup()) {
                Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');

                return $this->redirect(['index']);
            }

            $model->createAt = date('Y-m-d H:i:s');
            $model->updateAt=date('Y-m-d H:i:s');

            return $this->render('create', [
                'model' => $model,
            ]);

        }else{

            return $this->render('site/error');
        }

    }

    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('atualizarUtilizadores') && Yii::$app->user->can('atualizarPerfis')) {

        $perfil=Perfil::findOne($id);
        $user=User::findOne($id);

        if ($user->load(Yii::$app->request->post()) && $user->save() && $perfil->load(Yii::$app->request->post()) && $perfil->save()) {

            $this->actionRemovecargo($perfil->id_user);

            $this->actionUpdatecargo($perfil->cargo,$perfil->id_user);

            return $this->redirect(['view', 'id' => $user->id]);
        }

            return $this->render('update', [
                'user' => $user,
                'perfil' => $perfil
            ]);
        }else{

            return $this->render('site/error');
        }


    }

    public function actionDelete($id)
    {
        if (Yii::$app->user->can('apagarUtilizadores') && Yii::$app->user->can('apagarPerfis')) {

            $user=User::findOne($id);
            $user->status=9;
            $user->save();

            return $this->redirect(['index']);

        }else{

            return $this->render('site/error');
        }


    }

    protected function findModel($id)
    {
        if (($user = User::findOne($id)) !== null) {
            return $user;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUpdatecargo($cargo_novo,$id_user){

        if (Yii::$app->user->can('atualizarCargos')) {

            $auth = Yii::$app->authManager;
            $novoCargo = $auth->getRole($cargo_novo);
            $auth->assign($novoCargo, $id_user);

        }

    }

    public function actionRemovecargo($id_user){

        if (Yii::$app->user->can('apagarCargos')) {


            Yii::$app->authManager->revokeAll($id_user);

        }
    }

    public function actionGetcargo($id_user){

        if (Yii::$app->user->can('consultarCargos')) {

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

        }else{

            return $this->render('site/error');
        }

    }
}
