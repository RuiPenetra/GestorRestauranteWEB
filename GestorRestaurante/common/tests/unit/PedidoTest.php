<?php namespace common\tests;

use common\models\Pedido;
use common\models\PedidoProduto;

class PedidoTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;
    protected $ID_USER;
    protected $ID_MESA;

    protected function _before()
    {
        $user = $this->tester->grabRecord('common\models\User', array('username' => 'joana'));
        $this->ID_USER=$user->id;

        $mesa=$this->tester->grabRecord('common\models\Mesa', array('id' => '1'));
        $this->ID_MESA=$mesa->id;
    }

    protected function _after()
    {
    }

    // tests
    public function testValidation()
    {

        $pedido=new Pedido();


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

        $pedido->scenario='scenariorestaurante';
        $pedido->data=null;
        $this->assertFalse($pedido->validate(['data']));

        $pedido->scenario='scenariotakeaway';
        $pedido->data=null;
        $this->assertFalse($pedido->validate(['data']));

        $pedido->data = date('Y-m-d H:i:s');
        $this->assertTrue($pedido->validate(['data']));

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


        $pedido->id_perfil='grgrgrg';
        $this->assertFalse($pedido->validate(['id_perfil']));

        $pedido->scenario='scenariorestaurante';
        $pedido->id_perfil=null;
        $this->assertFalse($pedido->validate(['id_perfil']));

        $pedido->scenario='scenariotakeaway';
        $pedido->id_perfil=null;
        $this->assertFalse($pedido->validate(['id_perfil']));

        $pedido->id_perfil=$this->ID_USER;
        $this->assertTrue($pedido->validate(['id_perfil']));


        $pedido->nome_pedido=767676767;
        $this->assertFalse($pedido->validate(['nome_pedido']));

        $pedido->nome_pedido='Lorem ipsum lacus suspendisse quisque pharetra platea pulvina.'; //Já existe
        $this->assertFalse($pedido->validate(['nome_pedido']));

        $pedido->scenario='scenariotakeaway';
        $pedido->nome_pedido=null;
        $this->assertFalse($pedido->validate(['nome_pedido']));

        $pedido->nome_pedido='João Antonio';
        $this->assertTrue($pedido->validate(['nome_pedido']));

        $pedido->id_mesa='gegegegeg';
        $this->assertFalse($pedido->validate(['id_mesa']));

        $pedido->scenario='scenariorestaurante';
        $pedido->id_mesa=null;
        $this->assertFalse($pedido->validate(['id_mesa']));

        $pedido->id_mesa=$this->ID_MESA;
        $this->assertTrue($pedido->validate(['id_mesa']));


    }



    public function testCreatePedidoTakeaway()
    {


        $pedido=new Pedido();

        $pedido->scenario='scenariotakeaway';
        $pedido->data='2021-01-20 14:34';
        $pedido->tipo=1;
        $pedido->estado=0;
        $pedido->nome_pedido='Alberto Silva';
        $pedido->id_perfil=$this->ID_USER;
        $pedido->nota='Bacalhau sem alface';
        $pedido->save();

        $this->tester->seeInDatabase('pedido', ['nome_pedido' => 'Alberto Silva', 'data' => '2021-01-20 14:34', 'estado' => 0, 'tipo' => 1]);

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
        $pedido->data='2021-01-20 14:34';
        $pedido->tipo=0;
        $pedido->estado=0;
        $pedido->id_mesa=$this->ID_MESA;
        $pedido->id_perfil=$this->ID_USER;
        $pedido->nota='Bitoque sem alface';
        $pedido->save();

        $this->tester->seeInDatabase('pedido', ['id_mesa' => $this->ID_MESA,'id_perfil' => $this->ID_USER ,'data' => '2021-01-20 14:34', 'estado' => 0, 'tipo' => 0]);
    }

    public function testUpdatePedidoRestaurante(){

        $pedido = $this->tester->grabRecord('common\models\Pedido', array('id_mesa' => $this->ID_MESA,'id_perfil' => $this->ID_USER,'estado' => 0, 'tipo' => 0 ));

        $pedido->nota='Bitoque sem cenoura e alho';

        $pedido->save();

        $this->tester->seeInDatabase('pedido', ['id_mesa' => $this->ID_MESA,'id_perfil' => $this->ID_USER,'nota' => 'Bitoque sem cenoura e alho', 'tipo' => 0]);

    }

    public function testDeletePedidoRestaurante(){

        $pedido = $this->tester->grabRecord('common\models\Pedido', array('id_mesa' => $this->ID_MESA,'id_perfil' => $this->ID_USER,'nota' => 'Bitoque sem cenoura e alho', 'tipo' => 0));

        $pedido->delete();

        $this->tester-> dontSeeRecord('common\models\Pedido', array('id_mesa' => $this->ID_MESA,'id_perfil' => $this->ID_USER,'nota' => 'Bitoque sem cenoura e alho', 'tipo' => 0));

    }

}


