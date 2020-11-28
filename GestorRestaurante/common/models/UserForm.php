<?php
/**
 * Created by PhpStorm.
 * User: Rui
 * Date: 26/11/2020
 * Time: 23:42
 */

namespace common\models;


use Yii;
use yii\base\Model;

class UserForm extends  Model
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

            ['cargo', 'required'],
            ['cargo', 'string'],

        ];
    }

    public function registar()
    {
        if (!$this->validate()) {
            return null;
        }


        $utilizador = new User();
        $utilizador->setUsername($this->username);
        $utilizador->setEmail($this->email);
        $utilizador->setPassword($this->password);
        $utilizador->setCreateAt($this->createAt);
        $utilizador->setUpdateAt($this->updateAt);
        $utilizador->generateAuthKey();
        $utilizador->generateEmailVerificationToken();
        $utilizador->save();


        $utilizador = User::findOne($utilizador->id);


        $perfil = new Perfil();
        $perfil->setIdUser($utilizador->id);
        $perfil->setNome($this->nome);
        $perfil->setApelido($this->apelido);
        $perfil->setMorada($this->morada);
        $perfil->setNacionalidade($this->nacionalidade);
        $perfil->setDatanascimento($this->datanascimento);
        $perfil->setCodigopostal($this->codigopostal);
        $perfil->setTelemovel($this->telemovel);
        $perfil->setGenero($this->genero);


        $isGuest = Yii::$app->user->isGuest;

        $auth = Yii::$app->authManager;

        $cargoselecionado = $this->cargo;


        if ($isGuest == true) {

            $cliente = $auth->getRole('cliente');
            $auth->assign($cliente, $utilizador->id);

        } else {

            if (Yii::$app->user->can('criarUtilizadores')) {

                $cargo = $auth->getRole($cargoselecionado);
                $auth->assign($cargo, $utilizador->id);

            }
        }

        return $perfil->save();
    }

    public function atualizar($id)
    {

        $user=Perfil::findOne($id);

        $this->id_user=$user->id_user;

        $this->username=$user->user->username;
        $this->email=$user->user->email;

        $this->nome=$user->nome;
        $this->apelido=$user->apelido;

        $this->morada=$user->morada;
        $this->nacionalidade=$user->nacionalidade;
        $this->datanascimento=$user->datanascimento;
        $this->codigopostal=$user->codigopostal;
        $this->telemovel=$user->telemovel;
        $this->genero=$user->genero;

        $this->cargo=$this->getCargo($user->id_user);


        return $this;
    }

    public function guardar()
    {
        if (!$this->validate()) {
            return null;
        }


        $utilizador = User::findOne($this->id_user);
        $utilizador->setUsername($this->username);
        $utilizador->setEmail($this->email);
        $utilizador->setUpdateAt($this->updateAt);
        $utilizador->save();

        $cargo_atual=$this->getCargo($this->id_user);

        $cargo_novo=$this->cargo;

        if($cargo_atual != $cargo_novo){

            $this->removeCargo($this->id_user);
            $this->updateCargo($cargo_novo,$this->id_user);
        }

        $perfil = Perfil::findOne($this->id_user);
        $perfil->setNome($this->nome);
        $perfil->setApelido($this->apelido);
        $perfil->setMorada($this->morada);
        $perfil->setNacionalidade($this->nacionalidade);
        $perfil->setDatanascimento($this->datanascimento);
        $perfil->setCodigopostal($this->codigopostal);
        $perfil->setTelemovel($this->telemovel);
        $perfil->setGenero($this->genero);

        return $perfil->save();
    }


    public function getCargo($id_user){

        if (Yii::$app->user->can('consultarCargos')) {

            if(Yii::$app->authManager->getAssignment('gerente',$id_user) != null){

                return $cargo="gerente";
            }else if(Yii::$app->authManager->getAssignment('atendedorPedidos',$id_user) != null){

                return $cargo="atendedorPedidos";
            }else if(Yii::$app->authManager->getAssignment('empregadoMesa',$id_user) != null){

                return $cargo="empregadoMesa";
            }else if(Yii::$app->authManager->getAssignment('cozinheiro',$id_user) != null){

                return $cargo="cozinheiro";
            }else{

                return $cargo="cliente";
            }

        }else{

            return $this->render('site/error');
        }

    }

    public function updateCargo($cargo_novo,$id_user){

        if (Yii::$app->user->can('atualizarCargos')) {

            $auth = Yii::$app->authManager;
            $novoCargo = $auth->getRole($cargo_novo);
            $auth->assign($novoCargo, $id_user);

        }else{

            return $this->render('site/error');
        }

    }

    public function removeCargo($id_user){

        if (Yii::$app->user->can('apagarCargos')) {


            Yii::$app->authManager->revokeAll($id_user);

        }else{

            return $this->render('site/error');
        }
    }
}