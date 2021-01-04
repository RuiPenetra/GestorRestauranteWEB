<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "falta".
 *
 * @property int $id
 * @property string $data
 * @property string $hora_inicio
 * @property string $hora_fim
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
            [['data', 'hora_inicio', 'hora_fim', 'num_horas', 'id_funcionario'], 'required'],
            [['data', 'hora_inicio', 'hora_fim'], 'safe'],
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
            'data' => 'Data',
            'hora_inicio' => 'Hora Inicio',
            'hora_fim' => 'Hora Fim',
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
