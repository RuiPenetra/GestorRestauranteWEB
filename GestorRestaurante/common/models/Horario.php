<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "horario".
 *
 * @property int $id
 * @property int $ano
 * @property string $mes
 * @property string $dia_semana
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
            [['ano', 'mes', 'dia_semana', 'hora_inicio', 'hora_fim', 'id_funcionario'], 'required'],
            [['ano', 'id_funcionario'], 'integer'],
            [['hora_inicio', 'hora_fim'], 'safe'],
            [['mes', 'dia_semana'], 'string', 'max' => 20],
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
            'ano' => 'Ano',
            'mes' => 'Mes',
            'dia_semana' => 'Dia Semana',
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
