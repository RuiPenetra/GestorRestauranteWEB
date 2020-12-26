<?php namespace common\tests;

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
        //TODO: VALIDAR ----> N_PESSOAS [ INTEGER ]
        //TODO: VALIDAR ----> N_PESSOAS [ REQUIRED ]

        //TODO: VALIDAR ----> DATA_HORA [ SAFE ]
        //TODO: VALIDAR ----> DATA_HORA [ REQUIRED ]

        //TODO: VALIDAR ----> TEMPO_RESERVA [ SAFE ]
        //TODO: VALIDAR ----> TEMPO_RESERVA [ REQUIRED ]

        //TODO: VALIDAR ----> NOME_DA_RESERVA [ STRING ]
        //TODO: VALIDAR ----> NOME_DA_RESERVA [ REQUIRED ]
        //TODO: VALIDAR ----> NOME_DA_RESERVA [ MAX-255 ]

        //TODO: VALIDAR ----> ID_MESA [ INTEGER ]
        //TODO: VALIDAR ----> ID_MESA [ REQUIRED ]
        //TODO: VALIDAR ----> ID_MESA [ EXIST ]

        //TODO: VALIDAR ----> ID_FUNCIONARIO [ INTEGER ]
        //TODO: VALIDAR ----> ID_FUNCIONARIO [ REQUIRED ]
        //TODO: VALIDAR ----> ID_FUNCIONARIO [ EXIST ]


    }

    public function testCreate()
    {

    }

    public function testUpdate()
    {

    }

    public function testDelete()
    {

    }
}