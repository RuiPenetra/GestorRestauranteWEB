<?php
/**
 * Created by PhpStorm.
 * User: Rui
 * Date: 28/10/2020
 * Time: 13:26
 */

namespace backend\controllers;


use yii\base\Controller;
use yii\filters\AccessControl;

class PedidoController extends Controller
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
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed~
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}