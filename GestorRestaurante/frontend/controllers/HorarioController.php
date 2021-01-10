<?php

namespace frontend\controllers;

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
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => ['cozinheiro','atendedorPedidos','empregadoMesa'],
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

    public function actionView($id)
    {
        $searchHorario = new HorarioSearch();
        $searchHorario->id_funcionario=$id;
        $searchHorario->mes='Janeiro';
        $dataProviderHorario = $searchHorario->search(Yii::$app->request->queryParams);

        return $this->render('view', [
            'searchHorario' => $searchHorario,
            'dataProviderHorario' => $dataProviderHorario,
        ]);
    }


    protected function findModel($id)
    {
        if (($model = Horario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
