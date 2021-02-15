<?php namespace common\tests;

use common\models\Perfil;
use common\models\User;
use Yii;

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testValidation()
    {
        $user= new User();

        $user->setUsername('joana');
        $this->assertFalse($user->validate(['username']));

        $user->setUsername(null);
        $this->assertFalse($user->validate(['username']));

        $user->setUsername('Rui');
        $this->assertTrue($user->validate(['username']));


        $user->setEmail(4564545454);
        $this->assertFalse($user->validate(['email']));

        $user->setEmail('ruipenetraGmail.com');
        $this->assertFalse($user->validate(['email']));

        $user->setEmail(null);
        $this->assertFalse($user->validate(['email']));

        $user->setEmail('joana@gmail.com');
        $this->assertFalse($user->validate(['email']));

        $user->setEmail('ruijorge@gmail.com');
        $this->assertTrue($user->validate(['email']));

        $user->setStatus(132);
        $this->assertFalse($user->validate(['status']));

        $user->setStatus(0);
        $this->assertTrue($user->validate(['status']));



        $perfil= new Perfil();

        $perfil->setNome(6565656);
        $this->assertFalse($perfil->validate(['nome']));

        $perfil->setNome('Lorem ipsum lacus suspendisse quisque pharetra platea pulvina');
        $this->assertFalse($perfil->validate(['nome']));

        $perfil->setNome(null);
        $this->assertFalse($perfil->validate(['nome']));

        $perfil->setNome('Rui');
        $this->assertTrue($perfil->validate(['nome']));

        $perfil->setApelido(3434);
        $this->assertFalse($perfil->validate(['apelido']));

        $perfil->setApelido('Lorem ipsum lacus dfer dsuspendisse quisque pharetra platea pulvina');
        $this->assertFalse($perfil->validate(['apelido']));

        $perfil->setApelido(null);
        $this->assertFalse($perfil->validate(['apelido']));

        $perfil->setApelido('Jorge');
        $this->assertTrue($perfil->validate(['apelido']));

        $perfil->setDatanascimento(null);
        $this->assertFalse($perfil->validate(['datanascimento']));

        $perfil->setDatanascimento('2000-07-02');
        $this->assertTrue($perfil->validate(['datanascimento']));

        $perfil->setMorada(343344);
        $this->assertFalse($perfil->validate(['morada']));

        $perfil->setMorada('Lorem ipsum lacus suspendisse quisque pharetra platea pulvinar imperdiet 
        hac libero suspendisse aliquet varius ut, nostra primis faucibus leo sollicitudin turpis dapibus felis 
        fermentum rutrum quisque imperdiet praesent.');
        $this->assertFalse($perfil->validate(['morada']));

        $perfil->setMorada(null);
        $this->assertFalse($perfil->validate(['morada']));

        $perfil->setMorada('Rua do tasco nº2');
        $this->assertTrue($perfil->validate(['morada']));

        $perfil->setCodigopostal(343344);
        $this->assertFalse($perfil->validate(['codigopostal']));

        $perfil->setCodigopostal('Lorem ipsum lacus suspendisse quisque pharetra platea pulvinar imperdiet 
        hac libero suspendisse aliquet varius ut..');
        $this->assertFalse($perfil->validate(['codigopostal']));

        $perfil->setCodigopostal(null);
        $this->assertFalse($perfil->validate(['codigopostal']));

        $perfil->setCodigopostal('2340-430');
        $this->assertTrue($perfil->validate(['codigopostal']));

        $perfil->setNacionalidade(56676767);
        $this->assertFalse($perfil->validate(['nacionalidade']));

        $perfil->setNacionalidade('Lorem ipsumg lacus ffeerr suspendisse quisque pharetra platea pulvinar imperdiet 
        hac libero suspendisse aliquet varius ut..');
        $this->assertFalse($perfil->validate(['nacionalidade']));

        $perfil->setNacionalidade(null);
        $this->assertFalse($perfil->validate(['nacionalidade']));

        $perfil->setNacionalidade('Portuguesa');
        $this->assertTrue($perfil->validate(['nacionalidade']));

        $perfil->setTelemovel(56676767);
        $this->assertFalse($perfil->validate(['telemovel']));

        $perfil->setTelemovel('Lorem fwf34 ipsumg lacus ffeerr suspendisse quisque pharetra platea pulvinar imperdiet 
        hac libero suspendisse aliquet varius ut..');
        $this->assertFalse($perfil->validate(['telemovel']));

        $perfil->setTelemovel('9182938493');
        $this->assertFalse($perfil->validate(['telemovel']));

        $perfil->setTelemovel(null);
        $this->assertFalse($perfil->validate(['telemovel']));

        $perfil->setTelemovel('+351939295049');
        $this->assertTrue($perfil->validate(['telemovel']));

        $perfil->setGenero('ffefefº+ºef');
        $this->assertFalse($perfil->validate(['genero']));

        $perfil->setGenero(null);
        $this->assertFalse($perfil->validate(['genero']));

        $perfil->setGenero(0);
        $this->assertTrue($perfil->validate(['genero']));
        

        $perfil->setCargo(34343434);
        $this->assertFalse($perfil->validate(['cargo']));

        $perfil->setCargo('Lorem ipsumg lacus ffeerr suspendisse quisque pharetra platea pulvinar imperdiet 
        hac libero suspendisse aliquet varius ut..');
        $this->assertFalse($perfil->validate(['cargo']));

        $perfil->setCargo(null);
        $this->assertFalse($perfil->validate(['cargo']));

        $perfil->setCargo('gerente');
        $this->assertTrue($perfil->validate(['cargo']));

    }


    public function testCreate()
    {

        $user=new User();
        $user->setUsername('Rui');
        $user->setEmail('ruijorge@gmail.com');
        $user->setPassword('ruijorge123456');
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save();

        $this->tester->seeInDatabase('user', ['username' => 'Rui', 'email' => 'ruijorge@gmail.com']);

        $user=$this->tester->grabRecord('common\models\User', array('username' => 'Rui','email' => 'ruijorge@gmail.com'));

        $perfil=new Perfil();

        $perfil->setIdUser($user->id);
        $perfil->setNome('Rui');
        $perfil->setApelido('Jorge');
        $perfil->setMorada('Rua do tasco nº2 Leiria');
        $perfil->setNacionalidade('Portuguesa');
        $perfil->setDatanascimento('2000-07-02');
        $perfil->setCodigopostal('2340-430');
        $perfil->setTelemovel('+351939295049');
        $perfil->setGenero(0);
        $perfil->setCargo('gerente');

        $perfil->save();

        $this->tester->seeInDatabase('perfil', ['nome' => 'Rui', 'apelido' => 'Jorge', 'telemovel'=>'+351939295049']);

    }

    public function testUpdate()
    {
        $user=$this->tester->grabRecord('common\models\User', array('username' => 'Rui','email' => 'ruijorge@gmail.com'));
        $user->username='RuiJorge';
        $user->setEmail('ruipenetra@gmail.com');
        $user->save();

        $this->tester->seeInDatabase('user', ['username' => 'Ruijorge','email' => 'ruipenetra@gmail.com']);

        $perfil=$this->tester->grabRecord('common\models\Perfil', array('nome' => 'Rui', 'apelido' => 'Jorge', 'telemovel'=>'+351939295049'));

        $perfil->setApelido('Miguel');
        $perfil->setMorada('Rua do tasco nº4 São Martinho');
        $perfil->setCodigopostal('2640-430');
        $perfil->setTelemovel('+351939293456');
        $perfil->setCargo('empregadoMesa');
        $perfil->save();

        $this->tester->seeInDatabase('perfil', ['nome' => 'Rui', 'apelido' => 'Miguel', 'telemovel'=>'+351939293456','cargo'=>'empregadoMesa']);

    }

    public function testDelete()
    {
        $perfil=$this->tester->grabRecord('common\models\Perfil', array('nome' => 'Rui', 'apelido' => 'Miguel', 'telemovel'=>'+351939293456','cargo'=>'empregadoMesa'));
        $perfil->delete();

        $this->tester-> dontSeeRecord('common\models\Perfil', array('nome' => 'Rui', 'apelido' => 'Miguel', 'telemovel'=>'+351939293456','cargo'=>'empregadoMesa'));

        $user=$this->tester->grabRecord('common\models\User', array('username' => 'Ruijorge','email' => 'ruipenetra@gmail.com'));
        $user->delete();

        $this->tester-> dontSeeRecord('common\models\User', array('username' => 'Ruijorge','email' => 'ruipenetra@gmail.com'));

    }

}