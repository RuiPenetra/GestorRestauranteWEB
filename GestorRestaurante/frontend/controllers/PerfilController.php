<?php

namespace frontend\controllers;

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
                        'actions' => ['update' ],
                        'allow' => true,
                        'roles' => ['@'],
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
     * Updates an existing Perfil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('atualizarPerfis') && Yii::$app->user->can('atualizarUtilizadores')) {
            $user = User::findOne($id);
            $perfil = $this->findModel($user->id);
            $perfil->cargo = $this->Getcargo($user->id);


            if ($user->load(Yii::$app->request->post()) && $user->save() && $perfil->load(Yii::$app->request->post()) && $perfil->save()) {


                return $this->redirect(['myperfil', 'id' => $user->id]);
            }

            return $this->render('perfil', [
                'perfil' => $perfil,
                'user' => $user
            ]);
        }
        else{
            return $this->render('/site/error',[
                'name'=>'name'
            ]);
        }
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


    public function Getcargo($id_user)
    {


            if (Yii::$app->authManager->getAssignment('gerente', $id_user) != null) {

                return $cargo = "Gerente";
            } else if (Yii::$app->authManager->getAssignment('atendedorPedidos', $id_user) != null) {

                return $cargo = "AtendedorPedidos";
            } else if (Yii::$app->authManager->getAssignment('empregadoMesa', $id_user) != null) {

                return $cargo = "EmpregadoMesa";
            } else if (Yii::$app->authManager->getAssignment('cozinheiro', $id_user) != null) {

                return $cargo = "Cozinheiro";
            } else {

                return $cargo = "Cliente";
            }
        }
}