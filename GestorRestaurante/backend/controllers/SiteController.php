<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
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
                        'actions' => ['login','error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'index','error','contactos'],
                        'allow' => true,
                        'roles' => ['gerente'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('apagarUtilizadores')) {

            return $this->render('painel');

        }else{
            return $this->render('site/error');

        }
    }

    public function actionContactos()
    {
        if (Yii::$app->user->can('apagarUtilizadores')) {

            return $this->render('contactos');

        }else{
            return $this->render('site/error');

        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            if (Yii::$app->user->can('apagarUtilizadores')) {
//                Yii::$app->session->setFlash('danger', 'Utilizador não tem premissão para aceder');

                return $this->goBack();
            }else{

                Yii::$app->user->logout();
                return $this->redirect(Yii::$app->urlManagerFrontend->createUrl('site/login'));
                Yii::$app->session->setFlash('danger', 'Utilizador não tem premissão para aceder');

            }

        }else{
            $model->password = '';

            $this->layout="main_principal";
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionError()
    {
        $error = Yii::app()->errorHandler->error;
        if ($error)
            $this->render('error', array('error'=>$error));
        else
            throw new CHttpException(404, 'Page not found.');
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goBack();
    }
}
