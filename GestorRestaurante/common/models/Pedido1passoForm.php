<?php

namespace common\models;

use Yii;
use yii\base\Model;


class Pedido1passoForm extends Model
{

    public $tipo;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'tipo'], 'required'],
            [[ 'tipo'], 'integer'],
        ];
    }


}
