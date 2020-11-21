<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categoria_produto".
 *
 * @property int $id
 * @property string $categoria
 * @property int $editavel
 *
 * @property ProdutoCategoriaProduto[] $produtoCategoriaProdutos
 */
class CategoriaProduto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria_produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoria', 'editavel'], 'required'],
            [['editavel'], 'boolean', 'trueValue' => true, 'falseValue' => false, 'strict' => true],
            [['categoria'], 'string', 'max' => 255],
            [['categoria'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoria' => 'Categoria',
            'editavel' => 'Editavel',
        ];
    }

    /**
     * Gets query for [[ProdutoCategoriaProdutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutoCategoriaProdutos()
    {
        return $this->hasMany(ProdutoCategoriaProduto::className(), ['id_categoria_produto' => 'id']);
    }
}
