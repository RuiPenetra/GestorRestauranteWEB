<?php

namespace common\models;

use backend\models\Pedidoproduto;
use backend\models\ProdutoCategoriaProduto;
use Yii;

/**
 * This is the model class for table "produto".
 *
 * @property int $id
 * @property string $nome
 * @property string $ingredientes
 * @property float $preco
 *
 * @property PedidoProduto[] $pedidoProdutos
 * @property ProdutoCategoriaProduto[] $produtoCategoriaProdutos
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'ingredientes', 'preco'], 'required'],
            [['preco'], 'number'],
            [['nome'], 'string', 'max' => 255],
            [['ingredientes'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'ingredientes' => 'Ingredientes',
            'preco' => 'Preco',
        ];
    }

    /**
     * Gets query for [[PedidoProdutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoProdutos()
    {
        return $this->hasMany(PedidoProduto::className(), ['id_produto' => 'id']);
    }

    /**
     * Gets query for [[ProdutoCategoriaProdutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutoCategoriaProdutos()
    {
        return $this->hasMany(ProdutoCategoriaProduto::className(), ['id_produto' => 'id']);
    }

    public function beforeSave($insert) {

        if (parent::beforeSave($insert)) {

            $this->preco = str_replace(".", ",", $this->preco);

            return true;

        } else {

            return false;

        }

    }

}
