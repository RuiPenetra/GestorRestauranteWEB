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

        //TODO: VALIDAR ----> USERNAME [ STRING ]
        //
        //Validar se o username ja existe
        $user->setUsername('joana');
        $this->assertFalse($user->validate(['username']));

        //Validar se o username null
        $user->setUsername(null);
        $this->assertFalse($user->validate(['username']));

        //Validar se o username
        $user->setUsername('Rui');
        $this->assertTrue($user->validate(['username']));

        //TODO: VALIDAR ----> EMAIL [ EMAIL ]
        //TODO: VALIDAR ----> EMAIL [ REQUIRED ]
        //TODO: VALIDAR ----> EMAIL [ UNIQUE ]

        $user->setEmail(4564545454);
        $this->assertFalse($user->validate(['email']));

        $user->setEmail('ruipenetraGmail.com');
        $this->assertFalse($user->validate(['email']));

        $user->setEmail(null);
        $this->assertFalse($user->validate(['email']));

        $user->setEmail('developeranything@gmail.com');
        $this->assertFalse($user->validate(['email']));

        $user->setEmail('ruijorge@gmail.com');
        $this->assertTrue($user->validate(['email']));


        //TODO: VALIDAR ----> PASSWORD [ STRING ]
        //TODO: VALIDAR ----> PASSWORD [ REQUIRED ]

        //TODO: VALIDAR ----> STATUS [ REQUIRED ]
        $user->setStatus(132);
        $this->assertFalse($user->validate(['status']));

        $user->setStatus(0);
        $this->assertTrue($user->validate(['status']));



        $perfil= new Perfil();

        //TODO: VALIDAR ----> NOME [ STRING ]
        //TODO: VALIDAR ----> NOME [ REQUIRED ]
        //TODO: VALIDAR ----> NOME [ MAX-25 ]
        $perfil->setNome(6565656);
        $this->assertFalse($perfil->validate(['nome']));

        $perfil->setNome('Lorem ipsum lacus suspendisse quisque pharetra platea pulvina');
        $this->assertFalse($perfil->validate(['nome']));

        $perfil->setNome(null);
        $this->assertFalse($perfil->validate(['nome']));

        $perfil->setNome('Rui');
        $this->assertTrue($perfil->validate(['nome']));

        //TODO: VALIDAR ----> APELIDO [ STRING ]
        //TODO: VALIDAR ----> APELIDO [ REQUIRED ]
        //TODO: VALIDAR ----> APELIDO [ MAX-25 ]

        $perfil->setApelido(3434);
        $this->assertFalse($perfil->validate(['apelido']));

        $perfil->setApelido('Lorem ipsum lacus dfer dsuspendisse quisque pharetra platea pulvina');
        $this->assertFalse($perfil->validate(['apelido']));

        $perfil->setApelido(null);
        $this->assertFalse($perfil->validate(['apelido']));

        $perfil->setApelido('Jorge');
        $this->assertTrue($perfil->validate(['apelido']));

        //TODO: VALIDAR ----> DATA-NASCIMENTO [ SAFE ]
        //TODO: VALIDAR ----> DATA-NASCIMENTO [ REQUIRED ]

        $perfil->setDatanascimento(null);
        $this->assertFalse($perfil->validate(['datanascimento']));

        $perfil->setDatanascimento('02-07-2000');
        $this->assertTrue($perfil->validate(['datanascimento']));

        //TODO: VALIDAR ----> MORADA [ STRING ]
        //TODO: VALIDAR ----> MORADA [ REQUIRED ]
        //TODO: VALIDAR ----> MORADA [ MAX-150 ]

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

        //TODO: VALIDAR ----> CODIGO-POSTAL [ STRING ]
        //TODO: VALIDAR ----> CODIGO-POSTAL [ REQUIRED ]
        //TODO: VALIDAR ----> CODIGO-POSTAL [ MAX-8 ]

        $perfil->setCodigopostal(343344);
        $this->assertFalse($perfil->validate(['codigopostal']));

        $perfil->setCodigopostal('Lorem ipsum lacus suspendisse quisque pharetra platea pulvinar imperdiet 
        hac libero suspendisse aliquet varius ut..');
        $this->assertFalse($perfil->validate(['codigopostal']));

        $perfil->setCodigopostal(null);
        $this->assertFalse($perfil->validate(['codigopostal']));

        $perfil->setCodigopostal('2340-430');
        $this->assertTrue($perfil->validate(['codigopostal']));

        //TODO: VALIDAR ----> NACIONALIDADE [ STRING ]
        //TODO: VALIDAR ----> NACIONALIDADE [ REQUIRED ]
        //TODO: VALIDAR ----> NACIONALIDADE [ MAX-50 ]

        $perfil->setNacionalidade(56676767);
        $this->assertFalse($perfil->validate(['nacionalidade']));

        $perfil->setNacionalidade('Lorem ipsumg lacus ffeerr suspendisse quisque pharetra platea pulvinar imperdiet 
        hac libero suspendisse aliquet varius ut..');
        $this->assertFalse($perfil->validate(['nacionalidade']));

        $perfil->setNacionalidade(null);
        $this->assertFalse($perfil->validate(['nacionalidade']));

        $perfil->setNacionalidade('Portuguesa');
        $this->assertTrue($perfil->validate(['nacionalidade']));

        //TODO: VALIDAR ----> TELEMOVEL [ STRING ]
        //TODO: VALIDAR ----> TELEMOVEL [ REQUIRED ]
        //TODO: VALIDAR ----> TELEMOVEL [ UNIQUE ]
        //TODO: VALIDAR ----> TELEMOVEL [ MAX-13 ]

        $perfil->setTelemovel(56676767);
        $this->assertFalse($perfil->validate(['telemovel']));

        $perfil->setTelemovel('Lorem fwf34 ipsumg lacus ffeerr suspendisse quisque pharetra platea pulvinar imperdiet 
        hac libero suspendisse aliquet varius ut..');
        $this->assertFalse($perfil->validate(['telemovel']));

        $perfil->setTelemovel('983782982');
        $this->assertFalse($perfil->validate(['telemovel']));

        $perfil->setTelemovel(null);
        $this->assertFalse($perfil->validate(['telemovel']));

        $perfil->setTelemovel('+351939295049');
        $this->assertTrue($perfil->validate(['telemovel']));

        //TODO: VALIDAR ----> GENERO [ INTEGER ]
        //TODO: VALIDAR ----> GENERO [ REQUIRED ]
        $perfil->setGenero('ffefefº+ºef');
        $this->assertFalse($perfil->validate(['genero']));

        $perfil->setGenero(null);
        $this->assertFalse($perfil->validate(['genero']));

        $perfil->setGenero(0);
        $this->assertTrue($perfil->validate(['genero']));

        //TODO: VALIDAR ----> CARGO [ STRING ]
        //TODO: VALIDAR ----> CARGO [ REQUIRED ]
        //TODO: VALIDAR ----> CARGO [ MAX-50]

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
        $perfil->setDatanascimento(Yii::$app->formatter->asDate('02-07-2000'));
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
        $user->setUsername('Ruijorge');
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