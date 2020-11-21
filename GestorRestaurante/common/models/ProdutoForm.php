<?php
/**
 * Created by PhpStorm.
 * User: Rui
 * Date: 18/11/2020
 * Time: 18:26
 */

namespace common\models;


use yii\base\Model;

class ProdutoForm extends Model
{

    public $nome;
    public $preco;
    public $ingredientes;
    public $id_categoria_produto;
    public $id_produto;


    public function rules()
    {
        return[
            [['nome', 'ingredientes', 'preco','id_categoria_produto'], 'required'],
            ['preco', 'number'],
            ['nome', 'string', 'max' => 255],
            ['nome', 'unique', 'targetClass' => '\common\models\Produto', 'message' => 'Este produto já existe.'],
            ['ingredientes', 'string', 'max' => 500],
            ['id_categoria_produto', 'integer'],

        ];

    }

    public function produto(){

        if (!$this->validate()) {
            return null;
        }


        $produto= new Produto();
        $produto->nome=$this->nome;
        $produto->preco=$this->preco;
        $produto->ingredientes=$this->ingredientes;

        $produto->save();

        $produto_categoria= new ProdutoCategoriaProduto();
        $produto_categoria->id_categoria_produto=$this->id_categoria_produto;
        $produto_categoria->id_produto=$produto->id;

        return $produto_categoria->save();


    }
}