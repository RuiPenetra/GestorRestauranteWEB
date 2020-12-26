<?php namespace common\tests;

class SignupFormTest extends \Codeception\Test\Unit
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

        //TODO: VALIDAR ---->NOME [ STRING ]
        //TODO: VALIDAR ---->NOME [ REQUIRED ]
        //TODO: VALIDAR ---->NOME [ UNIQUE ]

        //TODO: VALIDAR ---->PRECO [ NUMBER ]
        //TODO: VALIDAR ---->PRECO [ REQUIRED ]

        //TODO: VALIDAR ---->ESTADO [ INTEGER ]
        //TODO: VALIDAR ---->ESTADO [ REQUIRED ]

        //TODO: VALIDAR ---->ID_CATEGORIA [ INTEGER ]
        //TODO: VALIDAR ---->ID_CATEGORIA [ EXIST ]
        //TODO: VALIDAR ---->ID_CATEGORIA [ REQUIRED ]

        //TODO: VALIDAR ---->INGREDIENTES [ STRING ]
        //TODO: VALIDAR ---->INGREDIENTES [ MAX-500 ]

    }
}