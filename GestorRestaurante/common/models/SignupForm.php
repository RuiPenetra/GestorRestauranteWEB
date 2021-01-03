<?php
namespace common\models;

use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;


class SignupForm extends Model
{

    public $id_user;
    public $username;
    public $email;
    public $password;
    public $nome;
    public $apelido;
    public $morada;
    public $codigopostal;
    public $telemovel;
    public $nacionalidade;
    public $datanascimento;
    public $genero;
    public $createAt;
    public $updateAt;
    public $cargo;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este nome de utilizador ja existe.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este email de utilizador ja existe.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['nome', 'trim'],
            ['nome', 'required'],
            ['nome', 'string', 'min' => 3, 'max' => 25],

            ['apelido', 'trim'],
            ['apelido', 'required'],
            ['apelido', 'string', 'min' => 3, 'max' => 25],

            ['morada', 'required'],
            ['morada', 'string', 'max' => 150],

            ['codigopostal', 'required'],
            ['codigopostal', 'string', 'max' => 8],

            ['datanascimento', 'required'],
            ['datanascimento', 'safe'],

            ['telemovel', 'required'],
            ['telemovel', 'string', 'max' => 13],

            ['nacionalidade', 'required'],
            ['nacionalidade', 'string', 'max' => 50],

            ['genero', 'required'],
            ['genero', 'in', 'range' => [0,1]],

            ['cargo', 'required'],
            ['cargo', 'string', 'max' => 50],

        ];
    }


    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }

        
        $utilizador  = new User();
        $utilizador->setUsername($this->username);
        $utilizador->setEmail($this->email);
        $utilizador->setPassword($this->password);
        $utilizador->setCreateAt($this->createAt);
        $utilizador->setUpdateAt($this->updateAt);
        $utilizador->generateAuthKey();
        $utilizador->generateEmailVerificationToken();
        $utilizador->save();


        $utilizador=User::findOne($utilizador->id);


        $perfil  = new Perfil();
        $perfil->setIdUser($utilizador->id);
        $perfil->setNome($this->nome);
        $perfil->setApelido($this->apelido);
        $perfil->setMorada($this->morada);
        $perfil->setNacionalidade($this->nacionalidade);
        $perfil->setDatanascimento($this->datanascimento);
        $perfil->setCodigopostal($this->codigopostal);
        $perfil->setTelemovel($this->telemovel);
        $perfil->setGenero($this->genero);
        $perfil->setCargo($this->cargo);


        $isGuest = Yii::$app->user->isGuest;

        $auth = Yii::$app->authManager;

        if($isGuest ==true){
            $cliente = $auth->getRole('cliente');
            $auth->assign($cliente, $utilizador->id);

        }else{

            if (Yii::$app->user->can('criarUtilizadores')) {

                $perfil->setCargo($this->cargo);
                $cargo = $auth->getRole($this->cargo);
                $auth->assign($cargo, $utilizador->id);

            }
        }

        if($perfil ->save()){

            return true;
        }else{

            $utilizador->delete();
            return false;
        }

    }

    /**
     * Sends confirmation email to user
     * @param User $utilizador  user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($utilizador )
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $utilizador ]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
