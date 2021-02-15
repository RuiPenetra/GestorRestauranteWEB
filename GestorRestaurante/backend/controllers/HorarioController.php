<?php

namespace backend\controllers;

use common\models\Perfil;
use common\models\PerfilSearch;
use Yii;
use common\models\Horario;
use common\models\HorarioSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HorarioController implements the CRUD actions for Horario model.
 */
class HorarioController extends Controller
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
                        'actions' => ['index','view','viewall','create','update','delete'],
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
        if(Yii::$app->user->can('consultarUtilizadores')){

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
        if(Yii::$app->user->can('consultarHorarios')){

            $horario=Horario::findOne($id);
            $user=Perfil::findOne($horario->id_funcionario);
            $searchHorario = new HorarioSearch();
            $searchHorario->id_funcionario=$horario->id_funcionario;
            $searchHorario->ano=$horario->ano;
            $searchHorario->mes=$horario->mes;

            $dataProviderHorario = $searchHorario->search(Yii::$app->request->queryParams);

            return $this->render('view', [
                'user'=>$user,
                'dataProviderHorario' => $dataProviderHorario,
                'searchHorario' => $searchHorario,
            ]);
        }else{

            return $this->render('site/error');
        }
    }

    public function actionViewall($id)
    {
        if(Yii::$app->user->can('consultarHorarios')){

            $user=Perfil::findOne($id);
            $searchHorario = new HorarioSearch();
            $searchHorario->id_funcionario=$user->id_user;
            $searchHorario->mes="Janeiro";

            $dataProviderHorario = $searchHorario->search(Yii::$app->request->queryParams);

            return $this->render('viewAll', [
                'user'=>$user,
                'dataProviderHorario' => $dataProviderHorario,
                'searchHorario' => $searchHorario,
            ]);
        }else{

            return $this->render('site/error');
        }
    }

    public function actionCreate($id)
    {
        if(Yii::$app->user->can('criarHorarios') && Yii::$app->user->can('consultarHorarios')){

            $user=Perfil::findOne($id);

            $searchHorario = new HorarioSearch();
            $searchHorario->id_funcionario=$user->id_user;
            $searchHorario->mes='Janeiro';
            $dataProviderHorario = $searchHorario->search(Yii::$app->request->queryParams);

            $novoHorario = new Horario();
            $novoHorario->id_funcionario=$user->id_user;

            if ($novoHorario->load(Yii::$app->request->post()) && $novoHorario->save()) {

                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-check-circle',
                    'message' => 'Horario criado com sucesso',
                    'title' => 'Concluido',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);

                return $this->redirect(['viewall','id'=>$novoHorario->id_funcionario]);
                //return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('create', [
                'novoHorario' => $novoHorario,
                'dataProviderHorario' => $dataProviderHorario,
                'searchHorario' => $searchHorario,
            ]);
        }else{

            return $this->render('site/error');
        }
    }

    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('atualizarHorarios') && Yii::$app->user->can('consultarHorarios')){

            $horario=$this->findModel($id);
            $searchHorario = new HorarioSearch();
            $searchHorario->id_funcionario=$horario->id_funcionario;
            $searchHorario->mes=$horario->mes;
            $dataProviderHorario = $searchHorario->search(Yii::$app->request->queryParams);

            if ($horario->load(Yii::$app->request->post()) && $horario->save()) {
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fas fa-check-circle',
                    'message' => 'Horario atualizado com sucesso',
                    'title' => 'Concluido',
                    'positonX' => 'right',
                    'positonY' => 'top'
                ]);
                return $this->redirect(['view', 'id' => $horario->id]);
            }

            return $this->render('update', [
                'horario' => $horario,
                'dataProviderHorario' => $dataProviderHorario,
                'searchHorario' => $searchHorario,
            ]);
        }else{

            return $this->render('site/error');
        }
    }

    public function actionDelete($id)
    {
        if(Yii::$app->user->can('apagarHorarios')){

            $horario=Horario::findOne($id);
            $horario->delete();

            Yii::$app->getSession()->setFlash('success', [
                'type' => 'success',
                'duration' => 5000,
                'icon' => 'fas fa-check-circle',
                'message' => 'Horario apagado com sucesso',
                'title' => 'Concluido',
                'positonX' => 'right',
                'positonY' => 'top'
            ]);

            return $this->redirect(['viewall','id'=>$horario->id_funcionario]);
        }else{

            return $this->render('site/error');
        }
    }

    protected function findModel($id)
    {
        if (($model = Horario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
