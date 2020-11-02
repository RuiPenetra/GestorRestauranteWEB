<?php
namespace common\models;

use Yii;
use yii\base\Model;


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
            ['nome', 'string', 'min' => 2, 'max' => 255],

            ['apelido', 'trim'],
            ['apelido', 'required'],
            ['apelido', 'string', 'min' => 2, 'max' => 255],

            ['morada', 'required'],
            ['morada', 'string', 'min' => 2, 'max' => 255],

            ['codigopostal', 'required'],
            ['codigopostal', 'string', 'min' => 2, 'max' => 255],

            ['datanascimento', 'required'],
            ['datanascimento', 'string'],


            ['telemovel', 'required'],
            ['telemovel', 'string', 'min' => 2, 'max' => 22],

            ['nacionalidade', 'required'],
            ['nacionalidade', 'string', 'min' => 2, 'max' => 255],

            ['genero', 'required'],
            ['genero', 'in', 'range' => [0,1]],

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

        
        $utilizador  = new User();
        $utilizador ->setUsername($this->username);
        $utilizador ->setEmail($this->email);
        $utilizador ->setPassword($this->password);
        $utilizador->setCreateAt($this->createAt);
        $utilizador->setUpdateAt($this->updateAt);
        $utilizador ->generateAuthKey();
        $utilizador ->generateEmailVerificationToken();
        $utilizador->save();


        $utilizador=User::findOne($utilizador->id);


        $perfil  = new Perfil();
        $perfil ->setIdUser($utilizador->id);
        $perfil ->setNome($this->nome);
        $perfil ->setApelido($this->apelido);
        $perfil ->setMorada($this->morada);
        $perfil ->setNacionalidade($this->nacionalidade);
        $perfil ->setDatanascimento($this->datanascimento);
        $perfil ->setCodigopostal($this->codigopostal);
        $perfil ->setTelemovel($this->telemovel);
        $perfil ->setGenero($this->genero);


        if (\Yii::$app->user->can('criarUtilizadores')) {

            $auth = Yii::$app->authManager;

            $cargoselecionado=$this->cargo;

            var_dump($cargoselecionado);
            if($cargoselecionado=="gerente") {

                $gerente = $auth->getRole('gerente');
                $auth->assign($gerente, $utilizador->id);

            }else if($cargoselecionado=="atendedorpedidos") {

                $atendedorpedidos = $auth->getRole('atendedorPedidos');
                $auth->assign($atendedorpedidos, $utilizador->id);

            }else if($cargoselecionado=="empregadomesa") {

                $empregadomesa = $auth->getRole('empregadomesa');
                $auth->assign($empregadomesa, $utilizador->id);

            }else if($cargoselecionado=="cozinheiro") {

                $cozinheiro = $auth->getRole('cozinheiro');
                $auth->assign($cozinheiro, $utilizador->id);

            }else {
                $cliente = $auth->getRole('cliente');
                $auth->assign($cliente, $utilizador->id);
            }

        }else{

            $auth = Yii::$app->authManager;
            $cliente = $auth->getRole('cliente');
            $auth->assign($cliente, $utilizador->id);
        }

        return $perfil ->save();

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
