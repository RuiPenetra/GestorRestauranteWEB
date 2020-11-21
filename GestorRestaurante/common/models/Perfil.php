<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "perfil".
 *
 * @property int $id_user
 * @property string $nome
 * @property string $apelido
 * @property string $morada
 * @property string $datanascimento
 * @property string $codigopostal
 * @property string $nacionalidade
 * @property string $telemovel
 * @property int $genero
 *
 * @property User $user
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perfil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'nome', 'apelido', 'morada', 'datanascimento', 'codigopostal', 'nacionalidade', 'telemovel', 'genero'], 'required'],
            [['id_user', 'genero'], 'integer'],
            [['datanascimento'], 'safe'],
            [['nome', 'apelido', 'morada', 'codigopostal', 'nacionalidade', 'telemovel'], 'string', 'max' => 255],
            [['id_user'], 'unique'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'nome' => 'Nome',
            'apelido' => 'Apelido',
            'morada' => 'Morada',
            'datanascimento' => 'Datanascimento',
            'codigopostal' => 'Codigopostal',
            'nacionalidade' => 'Nacionalidade',
            'telemovel' => 'Telemovel',
            'genero' => 'Genero',
        ];
    }

    /**
     * @return int
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param int $id_user
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getApelido()
    {
        return $this->apelido;
    }

    /**
     * @param string $apelido
     */
    public function setApelido($apelido)
    {
        $this->apelido = $apelido;
    }

    /**
     * @return string
     */
    public function getMorada()
    {
        return $this->morada;
    }

    /**
     * @param string $morada
     */
    public function setMorada($morada)
    {
        $this->morada = $morada;
    }

    /**
     * @return string
     */
    public function getDatanascimento()
    {
        return $this->datanascimento;
    }

    /**
     * @param string $datanascimento
     */
    public function setDatanascimento($datanascimento)
    {
        $this->datanascimento = $datanascimento;
    }

    /**
     * @return string
     */
    public function getCodigopostal()
    {
        return $this->codigopostal;
    }

    /**
     * @param string $codigopostal
     */
    public function setCodigopostal($codigopostal)
    {
        $this->codigopostal = $codigopostal;
    }

    /**
     * @return string
     */
    public function getNacionalidade()
    {
        return $this->nacionalidade;
    }

    /**
     * @param string $nacionalidade
     */
    public function setNacionalidade($nacionalidade)
    {
        $this->nacionalidade = $nacionalidade;
    }

    /**
     * @return string
     */
    public function getTelemovel()
    {
        return $this->telemovel;
    }

    /**
     * @param string $telemovel
     */
    public function setTelemovel($telemovel)
    {
        $this->telemovel = $telemovel;
    }

    /**
     * @return int
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * @param int $genero
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }


    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    public function getCount()
    {
        return $count= Perfil::find()->count();
    }
}
