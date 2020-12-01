<?php

namespace common\models;

use phpDocumentor\Reflection\Types\Integer;
use Yii;
use yii\base\Model;


class Pedido2passoForm extends Model
{


    public $estado;
    public $tipo;
    public $nome_pedido;
    public $scenario;
    public $id_mesa;
    public $id_perfil;
    public $nota;


    public function rules()
    {
        return [
            [['estado','tipo','id_perfil'], 'required'],
            [['estado', 'tipo', 'id_mesa', 'id_perfil'], 'integer'],
            [['nome_pedido','nota','scenario'], 'string', 'max' => 255],
            [['id_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['id_perfil' => 'id_user']],
            [['id_mesa'], 'exist', 'skipOnError' => true, 'targetClass' => Mesa::className(), 'targetAttribute' => ['id_mesa' => 'id']],
        ];
    }


    public function attributeLabels()
    {
        return [
            'estado' => 'Estado',
            'nota' => 'Nota',
            'quantidade' => 'Quantidade',
            'id_pedido' => 'Id Pedido',
            'id_produto' => 'Id Produto',
            'tipo' => 'Tipo',
            'nome_pedido' => 'Nome Pedido',
            'id_mesa' => 'Id Mesa',
            'id_perfil' => 'Id Perfil',

        ];
    }
    public function pedido(){


        if (!$this->validate()) {
            return null;
        }

        $pedido = new Pedido();


        $itemPedido= new PedidoProduto();

        $pedido->scenario=$this->scenario;
        $pedido->id_mesa=$this->id_mesa;
        $pedido->id_perfil=$this->id_perfil;
        $pedido->nome_pedido=$this->nome_pedido;
        $pedido->estado=1;
        $pedido->tipo=$this->tipo;
        $pedido->tipo=$this->estado;


   /*     if ($pedido->validate()) {
            // all inputs are valid
        } else {
            // validation failed: $errors is an array containing error messages
            return $errors = $pedido->errors;
        }*/
/*
        if ($pedido->save() == true) {


            $itemPedido->id_pedido = $pedido->id;
            $itemPedido->id_produto = (Integer)$this->id_produto;
            $itemPedido->quantidade = $this->quantidade;
            $itemPedido->nota = $this->nota;
            $itemPedido->estado = $this->estado_item_produto;

            return $itemPedido->save();
        }*/
        return $pedido->save();
    }

    public function quantidade($attribute,$params){

        if(!empty($this->quantidade)){

            $this->addError($this->quantidade,'Teste');
        }

    }
}
