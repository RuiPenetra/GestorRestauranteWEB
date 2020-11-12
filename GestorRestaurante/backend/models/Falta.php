<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "falta".
 *
 * @property int $id
 * @property string $data_inicio
 * @property string $data_fim
 * @property int $num_horas
 * @property int $id_funcionario
 *
 * @property Perfil $funcionario
 */
class Falta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'falta';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_inicio', 'data_fim', 'num_horas', 'id_funcionario'], 'required'],
            [['data_inicio', 'data_fim'], 'safe'],
            [['num_horas', 'id_funcionario'], 'integer'],
            [['id_funcionario'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['id_funcionario' => 'id_user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_inicio' => 'Data Inicio',
            'data_fim' => 'Data Fim',
            'num_horas' => 'Num Horas',
            'id_funcionario' => 'Id Funcionario',
        ];
    }

    /**
     * Gets query for [[Funcionario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionario()
    {
        return $this->hasOne(Perfil::className(), ['id_user' => 'id_funcionario']);
    }
}
