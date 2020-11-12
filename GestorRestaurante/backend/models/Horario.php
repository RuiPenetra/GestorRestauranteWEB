<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "horario".
 *
 * @property int $id
 * @property string $data
 * @property string $hora_inicio
 * @property string $hora_fim
 * @property int $id_funcionario
 *
 * @property Perfil $funcionario
 */
class Horario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'horario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'data', 'hora_inicio', 'hora_fim', 'id_funcionario'], 'required'],
            [['id', 'id_funcionario'], 'integer'],
            [['data', 'hora_inicio', 'hora_fim'], 'safe'],
            [['id'], 'unique'],
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
            'data' => 'Data',
            'hora_inicio' => 'Hora Inicio',
            'hora_fim' => 'Hora Fim',
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
