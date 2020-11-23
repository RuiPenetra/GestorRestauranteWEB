<?php

namespace common\models;

use phpDocumentor\Reflection\Types\Integer;
use Yii;
use yii\base\Model;


class PedidoTakeawayForm extends Model
{

    public $tipo;
    public $nome_pedido;
    public $id_mesa;

    public function rules()
    {
        return [
            [['tipo'], 'required'],
            [[ 'tipo'], 'integer'],
            [ 'id_mesa','teste'],
            ['nome_pedido', 'teste2']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tipo' => 'Tipo',
            'nome_pedido' => 'Nome Pedido',
        ];
    }

    public function teste($tipo,$id_mesa)
    {
        if($tipo==0 && $id_mesa==null){
            $this->addError($this->id_mesa, 'your password is not strong enough!');

        }
    }

    public function teste2($attribute)
    {
        if($this->tipo==1 && !empty($attribute)){
            $this->addError($attribute, 'your password is not strong enough!');

        }
    }

    public function takeaway(){


        if (!$this->validate()) {
            return null;
        }

        $pedido= new Pedido();
        var_dump($pedido->data=date("d-m-Y h:i:sa"),
        $pedido->estado='Em processo',
        $pedido->tipo=$this->tipo,
        $pedido->id_mesa=$this->id_mesa,
        $pedido->nome_pedido=$this->nome_pedido,
        $pedido->id_perfil=Yii::$app->user->identity->getId());

        die();

        return $pedido->save();

    }
}
