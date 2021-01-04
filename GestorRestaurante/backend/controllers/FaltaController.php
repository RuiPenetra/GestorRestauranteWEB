<?php

namespace backend\controllers;

use common\models\Perfil;
use common\models\PerfilSearch;
use common\models\User;
use common\models\UserSearch;
use DateTime;
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
                        'actions' => ['index','create','update','delete','view'],
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

            $dataProvider->pagination = ['pageSize' => 5];

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
        if (Yii::$app->user->can('consultarFaltas')) {
            $searchFalta = new FaltaSearch();
            $searchFalta->id_funcionario=$id;
            $dataprovider = $searchFalta->search(Yii::$app->request->queryParams);

            $user=Perfil::findOne($id);

            return $this->render('view', [
                'dataprovider' => $dataprovider,
                'searchFalta' => $searchFalta,
                'user'=> $user
            ]);
        }else{

            return $this->render('site/error');
        }
    }

    public function actionCreate($id)
    {
        if (Yii::$app->user->can('criarFaltas') && Yii::$app->user->can('consultarFaltas')) {

            $falta = new Falta();
            $searchFalta = new FaltaSearch();
            $searchFalta->id_funcionario=$id;
            $dataprovider = $searchFalta->search(Yii::$app->request->queryParams);

            $falta->id_funcionario=$id;
            $falta->num_horas=0;
            $user=Perfil::findOne($id);

            if ($falta->load(Yii::$app->request->post())) {

                if($falta->save()==true){
                    Yii::$app->getSession()->setFlash('success', [
                        'type' => 'success',
                        'duration' => 5000,
                        'icon' => 'fas fa-tags',
                        'message' => 'Falta criada com sucesso',
                        'title' => 'Sucesso',
                        'positonX' => 'right',
                        'positonY' => 'top'
                    ]);
                    return $this->redirect(['view', 'id' => $user->id_user]);
                }
            }

            return $this->render('create', [
                'falta' => $falta,
                'dataprovider' => $dataprovider,
                'searchFalta' => $searchFalta,
                'user'=>$user
            ]);
        }else{

            return $this->render('site/error');
        }
    }

    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('atualizarFaltas') && Yii::$app->user->can('consultarFaltas')) {

            $falta = $this->findModel($id);
            $searchFalta = new FaltaSearch();
            $searchFalta->id_funcionario=$id;
            $dataprovider = $searchFalta->search(Yii::$app->request->queryParams);

            if ($falta->load(Yii::$app->request->post()) && $falta->save()) {
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-tags',
                    'message' => 'Falta atualizada com sucesso',
                    'title' => 'Sucesso',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);
                return $this->redirect(['view', 'id' => $falta->id]);
            }

            return $this->render('update', [
                'falta' => $falta,
                'dataprovider' => $dataprovider,
                'searchFalta' => $searchFalta,
            ]);

        }else{

            return $this->render('site/error');
        }
    }

    public function actionDelete($id)
    {
        if (Yii::$app->user->can('apagarFaltas')&& Yii::$app->user->can('consultarFaltas')) {

            $falta=Falta::findOne($id);

            $falta->delete();

            if($falta->delete()==true){

                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-check-circle',
                    'message' => 'Horario atualizado com sucesso',
                    'title' => 'Concluido',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);

            }

            return $this->redirect(['view','id'=>$falta->id_funcionario]);
        }else{

            return $this->render('site/error');
        }
    }

    protected function findModel($id)
    {
        if (($model = Falta::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
