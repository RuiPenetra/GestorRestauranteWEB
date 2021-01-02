<?php namespace common\tests;

use common\models\Pedido;
use common\models\PedidoProduto;

class PedidoTest extends \Codeception\Test\Unit
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

        //TODO: ********** ERRO: A validação do campo nota so é possivel validar antes de
        //                       validar os campos associados a SCENARIOS

        //TODO: ********** DUVIDA: A validação do campo data aceita letras e numeros sem estarem relacionados ao formato data;


        $pedido=new Pedido();

        // VALIDAR ---->NOTA [ STRING ]
        // VALIDAR ---->NOTA [ MAX-255 ]

        $pedido->nota=456454545454545454545454545;
        $this->assertFalse($pedido->validate(['nota']));

        $pedido->nota='Lorem ipsum lacus suspendisse quisque pharetra platea pulvinar imperdiet 
        hac libero suspendisse aliquet varius ut, nostra primis faucibus leo sollicitudin turpis dapibus felis 
        fermentum rutrum quisque imperdiet praesent.Mattis tellus nam arcu aptent congue elementum cubilia nostra 
        dolor rhoncus, adipiscing metus feugiat mi inceptos curabitur ultricies pharetra eros ut, sem aliquam congue
         nullam non amet iaculis eleifend fames. rhoncus mattis lorem feugiat tortor eget amet, mattis augue lacus 
         pharetra egestas, dui maecenas bibendum curabitur tinciduntLorem ipsum lacus suspendisse quisque pharetra platea pulvinar imperdiet 
        hac libero suspendisse aliquet varius.';
        $this->assertFalse($pedido->validate(['nota']));

        $pedido->nota=null;
        $this->assertTrue($pedido->validate(['nota']));

        $pedido->nota='Bitoque sem ovo, Cozido a Portuguesa sem cenoura';
        $this->assertTrue($pedido->validate(['nota']));


        /* ########### CAMPOS ASSOCIADOS A SCENARIOS ########### */

        //TODO: ********** DUVIDA: A validação do campo data aceita letras e numeros sem estarem relacionados ao formato data;

        // VALIDAR ---->DATA [ SAFE ]
        // VALIDAR ---->DATA [ REQUIRED ]

//        $pedido->data=1212121;
//        $this->assertFalse($pedido->validate(['data']));

        $pedido->scenario='scenariorestaurante';
        $pedido->data=null;
        $this->assertFalse($pedido->validate(['data']));

        $pedido->scenario='scenariotakeaway';
        $pedido->data=null;
        $this->assertFalse($pedido->validate(['data']));

//        $pedido->data=0;
//        $this->assertFalse($pedido->validate(['data']));

        $pedido->data = date('Y-m-d H:i:s');
        $this->assertTrue($pedido->validate(['data']));

        // VALIDAR ---->ESTADO [ INTEGER ]
        // VALIDAR ---->ESTADO [ REQUIRED ]
        $pedido->estado='gjjgjty';
        $this->assertFalse($pedido->validate(['estado']));

        $pedido->scenario='scenariorestaurante';
        $pedido->estado=null;
        $this->assertFalse($pedido->validate(['estado']));

        $pedido->scenario='scenariotakeaway';
        $pedido->estado=null;
        $this->assertFalse($pedido->validate(['estado']));

        $pedido->estado=0;
        $this->assertTrue($pedido->validate(['estado']));


        // VALIDAR ---->TIPO [ INTEGER ]
        // VALIDAR ---->TIPO [ REQUIRED ]

        $pedido->tipo='grgrgrg';
        $this->assertFalse($pedido->validate(['tipo']));

        $pedido->scenario='scenariorestaurante';
        $pedido->tipo=null;
        $this->assertFalse($pedido->validate(['tipo']));

        $pedido->scenario='scenariotakeaway';
        $pedido->tipo=null;
        $this->assertFalse($pedido->validate(['tipo']));

        $pedido->tipo=1;
        $this->assertTrue($pedido->validate(['tipo']));


        // VALIDAR ---->ID_PERFIL [ INTEGER ]
        // VALIDAR ---->ID_PERFIL [ REQUIRED ]-->scenario= Takeaway / Restaurante
        // VALIDAR ---->ID_PERFIL [ EXIST ]

        $pedido->id_perfil='grgrgrg';
        $this->assertFalse($pedido->validate(['id_perfil']));

        $pedido->scenario='scenariorestaurante';
        $pedido->id_perfil=null;
        $this->assertFalse($pedido->validate(['id_perfil']));

        $pedido->scenario='scenariotakeaway';
        $pedido->id_perfil=null;
        $this->assertFalse($pedido->validate(['id_perfil']));

        $pedido->id_perfil=1;
        $this->assertTrue($pedido->validate(['id_perfil']));


        //TODO: Não testei com o scenario restaurante porque o NOME PEDIDO apenas e
        //      required no scenerio takeaway

        // VALIDAR ---->NOME_PEDIDO [ STRING ]
        // VALIDAR ---->NOME_PEDIDO [ REQUIRED ]-->scenario= Takeaway
        // VALIDAR ---->NOME_PEDIDO [ MAX-50 ]

        $pedido->nome_pedido=767676767;
        $this->assertFalse($pedido->validate(['nome_pedido']));

        $pedido->nome_pedido='Lorem ipsum lacus suspendisse quisque pharetra platea pulvina.'; //Já existe
        $this->assertFalse($pedido->validate(['nome_pedido']));

        $pedido->scenario='scenariotakeaway';
        $pedido->nome_pedido=null;
        $this->assertFalse($pedido->validate(['nome_pedido']));

        $pedido->nome_pedido='João Antonio';
        $this->assertTrue($pedido->validate(['nome_pedido']));


        //TODO: Não testei com o scenario takeaway porque o ID_MESA apenas é
        //      required no scenario restaurante

        // VALIDAR ---->ID_MESA [ INTEGER ]
        // VALIDAR ---->ID_MESA [ REQUIRED ]-->scenario= Restaurante
        // VALIDAR ---->ID_MESA [ EXIST ]

        $pedido->id_mesa='gegegegeg';
        $this->assertFalse($pedido->validate(['id_mesa']));

        $pedido->scenario='scenariorestaurante';
        $pedido->id_mesa=null;
        $this->assertFalse($pedido->validate(['id_mesa']));

        $pedido->id_mesa=2;
        $this->assertTrue($pedido->validate(['id_mesa']));


    }



    public function testCreatePedidoTakeaway()
    {


        $pedido=new Pedido();

        $pedido->scenario='scenariotakeaway';
        $pedido->data='20-01-2021 14:34';
        $pedido->tipo=1;
        $pedido->estado=0;
        $pedido->nome_pedido='Alberto Silva';
        $pedido->id_perfil=1;
        $pedido->nota='Bacalhau sem alface';
        $pedido->save();

        $this->tester->seeInDatabase('pedido', ['nome_pedido' => 'Alberto Silva', 'data' => '20-01-2021 14:34', 'estado' => 0, 'tipo' => 1]);

    }

    public function testUpdatePedidoTakeaway(){

        $pedido = $this->tester->grabRecord('common\models\Pedido', array('nome_pedido' => 'Alberto Silva'));

        $pedido->nome_pedido="Joana";

        $pedido->save();

        $this->tester->seeInDatabase('pedido', ['nome_pedido' => 'Joana', 'estado' => 0, 'tipo' => 1]);

    }

    public function testDeletePedidoTakeaway(){

        //dontSee dontSeeRecord
        $pedido = $this->tester->grabRecord('common\models\Pedido', array('nome_pedido' => 'Joana'));

        $pedido->delete();

        $this->tester->dontSeeRecord('common\models\Pedido', array('nome_pedido' => 'Joana', 'estado' => 0, 'tipo' => 1));

    }

    public function testCreatePedidoRestaurante()
    {

        $pedido=new Pedido();

        $pedido->scenario='scenariorestaurante';
        $pedido->data='20-01-2021 14:34';
        $pedido->tipo=0;
        $pedido->estado=0;
        $pedido->id_mesa=2;
        $pedido->id_perfil=1;
        $pedido->nota='Bitoque sem alface';
        $pedido->save();

        $this->tester->seeInDatabase('pedido', ['id_mesa' => 2, 'data' => '20-01-2021 14:34', 'estado' => 0, 'tipo' => 0]);
    }

    public function testUpdatePedidoRestaurante(){

        $pedido = $this->tester->grabRecord('common\models\Pedido', array('id_mesa' => 2,'id_perfil' => 1,'estado' => 0, 'tipo' => 0 ));

        $pedido->id_mesa=3;

        $pedido->save();

        $this->tester->seeInDatabase('pedido', ['id_mesa' => 3,'id_perfil' => 1,'estado' => 0, 'tipo' => 0]);

    }

    public function testDeletePedidoRestaurante(){

        $pedido = $this->tester->grabRecord('common\models\Pedido', array('id_mesa' => 3,'id_perfil' => 1,'estado' => 0, 'tipo' => 0));

        $pedido->delete();

        $this->tester-> dontSeeRecord('common\models\Pedido', array('id_mesa' => 3,'id_perfil' => 1,'estado' => 0, 'tipo' => 0));

    }

}


