<?php

namespace common\models;

use Yii;
use yii\base\Model;


class PedidoRestauranteForm extends Model
{

    public $tipo;
    public $id_mesa;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'id_mesa'], 'required'],
            [['id_mesa'], 'exist', 'skipOnError' => true, 'targetClass' => Mesa::className(), 'targetAttribute' => ['id_mesa' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mesa' => 'Id Mesa',
        ];
    }

    public function restaurante(){

        if (!$this->validate()) {
            return null;
        }

        $pedido= new Pedido();
        $pedido->data=date("d-m-Y h:i:sa");
        $pedido->estado='Em processo';
        $pedido->tipo=$this->tipo;
        $pedido->id_mesa=$this->id_mesa;
        $pedido->id_perfil=Yii::$app->user->identity->getId();
        $pedido->save();

        return ;

    }



}
