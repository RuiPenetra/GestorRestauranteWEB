<?php

namespace frontend\controllers;

use Yii;
use common\models\Falta;
use common\models\FaltaSearch;
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
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['atendedorPedidos','cozinheiro','empregadoMesa'],
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

    public function actionIndex($id)
    {
        $searchFalta = new FaltaSearch();
        $searchFalta->id_funcionario=$id;
        $dataProviderFalta = $searchFalta->search(Yii::$app->request->queryParams);

        $dataProviderFalta->pagination = ['pageSize' => 6];
        return $this->render('view', [
            'searchFalta' => $searchFalta,
            'dataProviderFalta' => $dataProviderFalta,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Falta::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
