<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_conf;
    public $nome;
    public $apelido;
    public $morada;
    public $codigopostal;
    public $telemovel;
    public $nacionalidade;
    public $datanascimento;
    public $genero;


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
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->nome = $this->nome;
        $user->apelido = $this->apelido;
        $user->morada = $this->morada;
        $user->nacionalidade = $this->nacionalidade;
        $user->datanascimento = $this->datanascimento;
        $user->codigopostal = $this->codigopostal;
        $user->codigopostal = $this->codigopostal;
        $user->telemovel= $this->telemovel;
        $user->genero= $this->genero;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save() && $this->sendEmail($user);

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
