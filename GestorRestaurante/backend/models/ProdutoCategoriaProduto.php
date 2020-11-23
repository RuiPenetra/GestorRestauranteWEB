<?php

namespace backend\models;

use common\models\CategoriaProduto;
use common\models\Produto;
use Yii;

/**
 * This is the model class for table "produto_categoria_produto".
 *
 * @property int $id_produto
 * @property int $id_categoria_produto
 *
 * @property Produto $produto
 * @property CategoriaProduto $categoriaProduto
 */
class ProdutoCategoriaProduto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produto_categoria_produto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_produto', 'id_categoria_produto'], 'required'],
            [['id_produto', 'id_categoria_produto'], 'integer'],
            [['id_produto'], 'exist', 'skipOnError' => true, 'targetClass' => Produto::className(), 'targetAttribute' => ['id_produto' => 'id']],
            [['id_categoria_produto'], 'exist', 'skipOnError' => true, 'targetClass' => CategoriaProduto::className(), 'targetAttribute' => ['id_categoria_produto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_produto' => 'Id Produto',
            'id_categoria_produto' => 'Id Categoria Produto',
        ];
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produto::className(), ['id' => 'id_produto']);
    }

    /**
     * Gets query for [[CategoriaProduto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriaProduto()
    {
        return $this->hasOne(CategoriaProduto::className(), ['id' => 'id_categoria_produto']);
    }
}
