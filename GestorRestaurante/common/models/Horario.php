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
            ['id_funcionario', 'required'],
            ['ano', 'required', 'message' => 'Ano deve ser preenchido'],
            ['mes', 'required', 'message' => 'Deve escolher o mês'],
            ['dia_semana', 'required', 'message' => 'Deve de escolher o dia da semana'],
            ['hora_inicio', 'required', 'message' => 'Hora Inicio deve ser preenchida'],
            ['hora_fim', 'required', 'message' => 'Hora Fim deve ser preenchida'],
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
