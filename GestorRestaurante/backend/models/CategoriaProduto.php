<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "categoria_produto".
 *
 * @property int $id
 * @property string $categoria
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
            [['categoria'], 'required'],
            [['categoria'], 'string', 'max' => 255],
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
