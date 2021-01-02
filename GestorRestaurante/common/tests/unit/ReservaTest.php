<?php namespace common\tests;

use common\models\Reserva;

class ReservaTest extends \Codeception\Test\Unit
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
        $reserva= new Reserva();

        //TODO: VALIDAR ----> N_PESSOAS [ INTEGER ]
        //TODO: VALIDAR ----> N_PESSOAS [ REQUIRED ]
        $reserva->n_pessoas='3 pessoas';
        $this->assertFalse($reserva->validate(['n_pessoas']));

        $reserva->n_pessoas=null;
        $this->assertFalse($reserva->validate(['n_pessoas']));

        $reserva->n_pessoas=3;
        $this->assertTrue($reserva->validate(['n_pessoas']));

        //TODO: VALIDAR ----> DATA_HORA [ SAFE ]
        //TODO: VALIDAR ----> DATA_HORA [ REQUIRED ]

        $reserva->data_hora=null;
        $this->assertFalse($reserva->validate(['data_hora']));

        $reserva->data_hora='2020-04-05 18:30';
        $this->assertTrue($reserva->validate(['data_hora']));

        //TODO: VALIDAR ----> NOME_DA_RESERVA [ STRING ]
        //TODO: VALIDAR ----> NOME_DA_RESERVA [ REQUIRED ]
        //TODO: VALIDAR ----> NOME_DA_RESERVA [ MAX-50 ]

        $reserva->nome_da_reserva=669590;
        $this->assertFalse($reserva->validate(['nome_da_reserva']));

        $reserva->nome_da_reserva='Lorem ipsum lacus suspendisse quisque pharetra platea pulvinar imperdiet 
        hac libero suspendisse aliquet varius ut, nostra primis faucibus leo sollicitudin turpis dapibus felis 
        fermentum rutrum quisque imperdiet praesent.';
        $this->assertFalse($reserva->validate(['nome_da_reserva']));

        $reserva->nome_da_reserva=null;
        $this->assertFalse($reserva->validate(['nome_da_reserva']));

        $reserva->nome_da_reserva='Alberto Francisco';
        $this->assertTrue($reserva->validate(['nome_da_reserva']));

        //TODO: VALIDAR ----> ID_MESA [ INTEGER ]
        //TODO: VALIDAR ----> ID_MESA [ REQUIRED ]
        //TODO: VALIDAR ----> ID_MESA [ EXIST ]

        $reserva->id_mesa='três';
        $this->assertFalse($reserva->validate(['id_mesa']));

        $reserva->id_mesa=9999;
        $this->assertFalse($reserva->validate(['id_mesa']));

        $reserva->id_mesa=null;
        $this->assertFalse($reserva->validate(['id_mesa']));

        $reserva->id_mesa=3;
        $this->assertTrue($reserva->validate(['id_mesa']));

        //TODO: VALIDAR ----> ID_FUNCIONARIO [ INTEGER ]
        //TODO: VALIDAR ----> ID_FUNCIONARIO [ REQUIRED ]
        //TODO: VALIDAR ----> ID_FUNCIONARIO [ EXIST ]

        $reserva->id_funcionario='teste 123';
        $this->assertFalse($reserva->validate(['id_funcionario']));

        $reserva->id_funcionario=9999;
        $this->assertFalse($reserva->validate(['id_funcionario']));

        $reserva->id_funcionario=null;
        $this->assertFalse($reserva->validate(['id_funcionario']));

        $reserva->id_funcionario=1;
        $this->assertTrue($reserva->validate(['id_funcionario']));

    }

    public function testCreate()
    {

        $reserva=new Reserva();

        $reserva->n_pessoas=3;
        $reserva->data_hora='2020-04-05 18:30';
        $reserva->nome_da_reserva='Alberto Francisco';
        $reserva->id_mesa=3;
        $reserva->id_funcionario=1;

        $reserva->save();

        $this->tester->seeInDatabase('reserva', ['n_pessoas' => 3, 'nome_da_reserva'=>'Alberto Francisco', 'id_mesa'=>3, 'id_funcionario'=>1]);


    }

    public function testUpdate()
    {
        $reserva = $this->tester->grabRecord('common\models\Reserva', array('n_pessoas' => 3, 'nome_da_reserva'=>'Alberto Francisco', 'id_mesa'=>3, 'id_funcionario'=>1));

        $reserva->n_pessoas=4;
        $reserva->data_hora='2020-04-05 20:30';
        $reserva->nome_da_reserva='Alberto Manuel';
        $reserva->id_mesa=4;
        $reserva->save();

        $this->tester->seeInDatabase('reserva', ['n_pessoas' => 4, 'nome_da_reserva'=>'Alberto Manuel', 'id_mesa'=>4, 'id_funcionario'=>1]);
    }

    public function testDelete()
    {
        $reserva = $this->tester->grabRecord('common\models\Reserva', array('n_pessoas' => 4, 'nome_da_reserva'=>'Alberto Manuel', 'id_mesa'=>4, 'id_funcionario'=>1));

        $reserva->delete();

        $this->tester->dontSeeRecord('common\models\Reserva', array('n_pessoas' => 4, 'nome_da_reserva'=>'Alberto Manuel', 'id_mesa'=>4, 'id_funcionario'=>1));

    }
}