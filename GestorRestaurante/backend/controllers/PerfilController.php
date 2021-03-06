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
                        'actions' => ['update'],
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


    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('atualizarPerfis') && Yii::$app->user->can('atualizarUtilizadores')) {

            $perfil=Perfil::findOne($id);
            $user=User::findOne($id);

            if ($user->load(Yii::$app->request->post()) && $user->save() && $perfil->load(Yii::$app->request->post()) && $perfil->save()) {

                $this->Removecargo($perfil->id_user);

                $this->Updatecargo($perfil->cargo,$perfil->id_user);

                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => 'Perfil atualizado com sucesso',
                    'title' => 'Sucesso',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);

                return $this->redirect(['update', 'id' => $user->id]);
            }

            return $this->render('update', [
                'user' => $user,
                'perfil' => $perfil
            ]);
        }else{

            return $this->render('site/error');
        }
    }

    protected function findModel($id)
    {
        if (($model = Perfil::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function Getcargo($id_user){

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

    protected function Updatecargo($cargo_novo,$id_user){

        $auth = Yii::$app->authManager;
        $novoCargo = $auth->getRole($cargo_novo);
        $auth->assign($novoCargo, $id_user);

    }

    protected function Removecargo($id_user){

         Yii::$app->authManager->revokeAll($id_user);
    }

}
