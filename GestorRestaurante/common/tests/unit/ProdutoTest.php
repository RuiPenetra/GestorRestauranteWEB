<?php namespace common\tests;

use common\models\CategoriaProduto;
use common\models\Produto;

class ProdutoTest extends \Codeception\Test\Unit
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

        $produto= new Produto();

        //TODO: VALIDAR ---->NOME [ STRING ]
        //TODO: VALIDAR ---->NOME [ REQUIRED ]
        //TODO: VALIDAR ---->NOME [ UNIQUE ]

        //Validar se o nome aceita numeros
        $produto->nome=1234567;
        $this->assertFalse($produto->validate(['nome']));

        //Validar se já existe
        $produto->nome='Bitoque'; //Já existe
        $this->assertFalse($produto->validate(['nome']));

        //Validar se passa do tamanho de 50x
        $produto->nome='Lorem ipsum lacus suspendisse quisque pharetra platea pulvina.'; //Já existe
        $this->assertFalse($produto->validate(['nome']));

        //Validar se for null
        $produto->nome=null;
        $this->assertFalse($produto->validate(['nome']));

        //Validar
        $produto->nome='Bacalhau à brás';
        $this->assertTrue($produto->validate(['nome']));


        //TODO: VALIDAR ---->PRECO [ NUMBER ]
        //TODO: VALIDAR ---->PRECO [ REQUIRED ]

        $produto->preco='teste123';
        $this->assertFalse($produto->validate(['preco']));

/*        $produto->preco=3232323.35546464646;
        $this->assertFalse($produto->validate(['preco']));*/

        $produto->preco=null;
        $this->assertFalse($produto->validate(['preco']));

        $produto->preco=17.34;
        $this->assertTrue($produto->validate(['preco']));



        //TODO: VALIDAR ---->ESTADO [ INTEGER ]
        //TODO: VALIDAR ---->ESTADO [ REQUIRED ]

        $produto->estado='teste43533';
        $this->assertFalse($produto->validate(['estado']));

        $produto->estado=3232323.35546464646;
        $this->assertFalse($produto->validate(['estado']));

        $produto->estado=null;
        $this->assertFalse($produto->validate(['estado']));

        $produto->estado=17;
        $this->assertTrue($produto->validate(['estado']));

        //TODO: VALIDAR ---->INGREDIENTES [ STRING ]
        //TODO: VALIDAR ---->INGREDIENTES [ MAX-500 ]

        $produto->ingredientes=565656565656;
        $this->assertFalse($produto->validate(['ingredientes']));

        $produto->ingredientes='Lorem ipsum lacus suspendisse quisque pharetra platea pulvinar imperdiet 
        hac libero suspendisse aliquet varius ut, nostra primis faucibus leo sollicitudin turpis dapibus felis 
        fermentum rutrum quisque imperdiet praesent.Mattis tellus nam arcu aptent congue elementum cubilia nostra 
        dolor rhoncus, adipiscing metus feugiat mi inceptos curabitur ultricies pharetra eros ut, sem aliquam congue
         nullam non amet iaculis eleifend fames. rhoncus mattis lorem feugiat tortor eget amet, mattis augue lacus 
         pharetra egestas, dui maecenas bibendum curabitur tincidunt. lacinia tempor nisi arcu coçoçoçlililill.';
        $this->assertFalse($produto->validate(['ingredientes']));

        $produto->ingredientes=null;
        $this->assertTrue($produto->validate(['ingredientes']));

        $produto->ingredientes='Lorem ipsum lacus suspendisse quisque pharetra platea pulvinar imperdiet 
        hac libero suspendisse aliquet varius ut, nostra primis faucibus leo sollicitudin turpis dapibus felis 
        fermentum rutrum quisque imperdiet praesent.';
        $this->assertTrue($produto->validate(['ingredientes']));


        //TODO: VALIDAR ---->ID_CATEGORIA [ INTEGER ]
        //TODO: VALIDAR ---->ID_CATEGORIA [ EXIST ]
        //TODO: VALIDAR ---->ID_CATEGORIA [ REQUIRED ]

        $produto->id_categoria='teste4fwfw3';
        $this->assertFalse($produto->validate(['id_categoria']));

        $produto->id_categoria=333333333333333333;
        $this->assertFalse($produto->validate(['id_categoria']));

        $produto->id_categoria=45.80;
        $this->assertFalse($produto->validate(['id_categoria']));

        $produto->id_categoria=null;
        $this->assertFalse($produto->validate(['id_categoria']));

/*        $produto->id_categoria=4;
        $this->assertTrue($produto->validate(['id_categoria']));*/

    }

    public function testCreate(){

        $produto= new Produto();

        $produto->nome='Bacalhau à zé do pipo';
        $produto->ingredientes='Bacalhau, batata';
        $produto->preco=17.89;
        $produto->estado=0;
        $produto->id_categoria=4;
        $produto->save();

        $this->tester->seeInDatabase('produto', ['nome' => 'Bacalhau à zé do pipo', 'preco' => 17.89, 'estado' => '0']);

    }

    public function testUpdate(){

        $produto=$this->tester->grabRecord('common\models\Produto', array('nome' => 'Bacalhau à zé do pipo','preco' => 17.89));
        $produto->nome='Bacalhau com natas';
        $produto->preco=8.50;
        $produto->save();

        $this->tester->seeInDatabase('produto', ['nome' => 'Bacalhau com natas', 'preco' => 8.50]);

    }

    public function testDelete(){

        $produto=$this->tester->grabRecord('common\models\Produto', array('nome' => 'Bacalhau com natas','preco' => 8.50));
        $produto->delete();

        $this->tester-> dontSeeRecord('common\models\Produto', array('nome' => 'Bacalhau com natas','preco' => 8.50));
    }
}