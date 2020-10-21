<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $morada
 * @property string $nome
 * @property string $apelido
 * @property string $datanascimento
 * @property int $nacionalidade
 * @property int $telemovel
 * @property string $codigopostal
 * @property int $genero
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property string|null $password_conf
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'morada', 'nome', 'apelido', 'datanascimento', 'nacionalidade', 'telemovel', 'codigopostal', 'genero', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['datanascimento'], 'safe'],
            [['nacionalidade', 'telemovel', 'genero', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'morada', 'nome', 'apelido', 'codigopostal', 'password_hash', 'password_reset_token', 'email', 'password_conf', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'morada' => 'Morada',
            'nome' => 'Nome',
            'apelido' => 'Apelido',
            'datanascimento' => 'Datanascimento',
            'nacionalidade' => 'Nacionalidade',
            'telemovel' => 'Telemovel',
            'codigopostal' => 'Codigopostal',
            'genero' => 'Genero',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'password_conf' => 'Password Conf',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'verification_token' => 'Verification Token',
        ];
    }
}
