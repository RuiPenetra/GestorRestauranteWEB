<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reserva".
 *
 * @property int $id
 * @property int $n_pessoas
 * @property string $data_hora
 * @property string $nome_da_reserva
 * @property int $id_mesa
 * @property int $id_funcionario
 *
 * @property Perfil $funcionario
 * @property Mesa $mesa
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['id_mesa', 'required','message'=>'Selecione uma mesa'],
            ['id_funcionario', 'required','message'=>'Selecione uma funcionário'],
            ['n_pessoas', 'required','message'=>'NºPessoas deve ser preenchido'],
            ['data_hora', 'required','message'=>'Data e Hora devem ser preenchidas'],
            ['nome_da_reserva', 'required','message'=>'Nome da reserva deve ser preenchido'],
            [['n_pessoas', 'id_mesa', 'id_funcionario'], 'integer'],
            [['data_hora'], 'safe'],
            [['nome_da_reserva'], 'string', 'max' => 50],
            [['id_funcionario'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['id_funcionario' => 'id_user']],
            [['id_mesa'], 'exist', 'skipOnError' => true, 'targetClass' => Mesa::className(), 'targetAttribute' => ['id_mesa' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'n_pessoas' => 'N Pessoas',
            'data_hora' => 'Data Hora',
            'nome_da_reserva' => 'Nome Da Reserva',
            'id_mesa' => 'Id Mesa',
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

    /**
     * Gets query for [[Mesa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMesa()
    {
        return $this->hasOne(Mesa::className(), ['id' => 'id_mesa']);
    }
}
