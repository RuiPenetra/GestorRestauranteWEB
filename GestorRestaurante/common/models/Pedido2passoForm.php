<?php

namespace common\models;

use phpDocumentor\Reflection\Types\Integer;
use Yii;
use yii\base\Model;


class Pedido2passoForm extends Model
{

    const SCENARIO_RESTAURANTE='scenariorestaurante';
    const SCENARIO_TAKEAWAY='scenariotakeaway';

    public $tipo;
    public $nome_pedido;
    public $id_mesa;
    public $quantidade;
    public $id_perfil;
    public $scenario;
    public $id_produto;
    public $nota;
    public $estado_item_produto;
    public $teste;


    public function rules()
    {
        return [
            [[ 'id_perfil','tipo','id_mesa','id_produto','quantidade','estado_item_produto'], 'integer'],
            [['nome_pedido','scenario','nota'], 'string'],
            [['id_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['id_perfil' => 'id_user']],
            [['id_mesa'], 'exist', 'skipOnError' => true, 'targetClass' => Mesa::className(), 'targetAttribute' => ['id_mesa' => 'id']],
            [['nota'], 'string', 'max' => 500]
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

        $teste=null;
        if (!$this->validate()) {
            return null;
        }else{
            $errors = $this->errors;
        }


        $pedido= new Pedido();
        $itemPedido= new PedidoProduto();

        $pedido->scenario=$this->scenario;
        $pedido->id_mesa=$this->id_mesa;
        $pedido->id_perfil=$this->id_perfil;
        $pedido->nome_pedido=$this->nome_pedido;
        $pedido->estado=1;
        $pedido->tipo=$this->tipo;

        if($pedido->save()==true){


            $itemPedido->id_pedido=$pedido->id;
            $itemPedido->id_produto= (Integer)$this->id_produto;
            $itemPedido->quantidade=$this->quantidade;
            $itemPedido->nota=$this->nota;
            $itemPedido->estado=$this->estado_item_produto;

            return $itemPedido->save();
        }
        return null;
    }

    public function quantidade($attribute,$params){

        if(!empty($this->quantidade)){

            $this->addError($this->quantidade,'Teste');
        }

    }
}
