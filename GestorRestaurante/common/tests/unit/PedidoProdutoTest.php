<?php namespace common\tests;

use common\models\Pedido;
use common\models\PedidoProduto;


class PedidoProdutoTest extends \Codeception\Test\Unit
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

        $pedidoProduto=new PedidoProduto();

        //TODO: VALIDAR ----> ID_PEDIDO [ INTEGER ]
        //TODO: VALIDAR ----> ID_PEDIDO [ NULL ]
        //TODO: VALIDAR ----> ID_PEDIDO [ EXIST ]

        $pedidoProduto->id_pedido='dwdwdwddwd';
        $this->assertFalse($pedidoProduto->validate(['id_pedido']));

        $pedidoProduto->id_pedido=null;
        $this->assertFalse($pedidoProduto->validate(['id_pedido']));

        $pedidoProduto->id_pedido=22;
        $this->assertFalse($pedidoProduto->validate(['id_pedido']));

        $pedidoProduto->id_pedido=1;
        $this->assertTrue($pedidoProduto->validate(['id_pedido']));

        //TODO: VALIDAR ----> ID_PRODUTO [ INTEGER ]
        //TODO: VALIDAR ----> ID_PRODUTO [ NULL ]
        //TODO: VALIDAR ----> ID_PRODUTO [ EXIST ]
        $pedidoProduto->id_produto='fefefefe';
        $this->assertFalse($pedidoProduto->validate(['id_produto']));

        $pedidoProduto->id_produto=null;
        $this->assertFalse($pedidoProduto->validate(['id_produto']));

        $pedidoProduto->id_produto=2223232;
        $this->assertFalse($pedidoProduto->validate(['id_produto']));

        $pedidoProduto->id_produto=1;
        $this->assertTrue($pedidoProduto->validate(['id_produto']));

        //TODO: VALIDAR ----> ESTADO [ INTEGER ]
        //TODO: VALIDAR ----> ESTADO [ NULL ]
        $pedidoProduto->estado='processo';
        $this->assertFalse($pedidoProduto->validate(['estado']));

        $pedidoProduto->estado=null;
        $this->assertFalse($pedidoProduto->validate(['estado']));

        $pedidoProduto->estado=1;
        $this->assertTrue($pedidoProduto->validate(['estado']));

        //TODO: VALIDAR ----> quant_Pedida [ INTEGER ]
        //TODO: VALIDAR ----> quant_Pedida [ NULL ]
        $pedidoProduto->quant_Pedida='testeeeee';
        $this->assertFalse($pedidoProduto->validate(['quant_Pedida']));

        $pedidoProduto->quant_Pedida=null;
        $this->assertFalse($pedidoProduto->validate(['quant_Pedida']));

        $pedidoProduto->quant_Pedida=4;
        $this->assertTrue($pedidoProduto->validate(['quant_Pedida']));

        //TODO: VALIDAR ----> quant_Preparacao [ INTEGER ]
        //TODO: VALIDAR ----> quant_Preparacao [ NULL ]
        $pedidoProduto->quant_Preparacao='feffffff';
        $this->assertFalse($pedidoProduto->validate(['quant_Preparacao']));

        $pedidoProduto->quant_Preparacao=null;
        $this->assertFalse($pedidoProduto->validate(['quant_Preparacao']));

        $pedidoProduto->quant_Preparacao=2;
        $this->assertTrue($pedidoProduto->validate(['quant_Preparacao']));

        //TODO: VALIDAR ----> quant_Entregue [ INTEGER ]
        //TODO: VALIDAR ----> quant_Entregue [ NULL ]
        $pedidoProduto->quant_Entregue='teste123';
        $this->assertFalse($pedidoProduto->validate(['quant_Entregue']));

        $pedidoProduto->quant_Entregue=null;
        $this->assertFalse($pedidoProduto->validate(['quant_Entregue']));

        $pedidoProduto->quant_Entregue=2;
        $this->assertTrue($pedidoProduto->validate(['quant_Entregue']));

        //TODO: VALIDAR ----> PRECO [ NUMBER ]
        //TODO: VALIDAR ----> PRECO [ NULL ]
        $pedidoProduto->preco='teste1234343';
        $this->assertFalse($pedidoProduto->validate(['preco']));

        $pedidoProduto->preco=null;
        $this->assertFalse($pedidoProduto->validate(['preco']));

        $pedidoProduto->preco=2.34;
        $this->assertTrue($pedidoProduto->validate(['preco']));

    }


    public function testCreate(){

        $pedido= new Pedido();

        $pedido->id_perfil=1;
        $pedido->estado=0;
        $pedido->scenario='scenariorestaurante';
        $pedido->nota='Bitoque sem arroz';
        $pedido->tipo=0;
        $pedido->data='2009-05-02 06:36:00';
        $pedido->id_mesa=2;
        $pedido->save();

        $this->tester->seeInDatabase('pedido', ['id_perfil' => 1, 'nota'=>'Bitoque sem arroz', 'tipo'=>0, 'id_mesa'=>2]);

        $pedido = $this->tester->grabRecord('common\models\Pedido', array('id_perfil' => 1, 'nota'=>'Bitoque sem arroz', 'tipo'=>0, 'id_mesa'=>2));

        $pedidoProduto= new PedidoProduto();

        $pedidoProduto->id_pedido=$pedido->id;
        $pedidoProduto->id_produto=1;
        $pedidoProduto->estado=0;
        $pedidoProduto->quant_Pedida=4;
        $pedidoProduto->quant_Preparacao=0;
        $pedidoProduto->quant_Entregue=0;
        $pedidoProduto->preco=4.45;
        $pedidoProduto->save();

        $this->tester->seeInDatabase('pedido_produto', ['id_produto' => 1, 'estado'=>0, 'quant_Pedida'=>4, 'quant_Entregue'=>0,'preco'=>4.45]);

    }

    public function testUpdate(){

        $pedidoProduto = $this->tester->grabRecord('common\models\Pedidoproduto', array('id_produto' => 1, 'estado'=>0, 'quant_Pedida'=>4, 'quant_Entregue'=>0,'preco'=>4.45));
        $pedidoProduto->quant_Pedida=5;
        $pedidoProduto->quant_Entregue=2;
        $pedidoProduto->estado=1;
        $pedidoProduto->preco=6.45;
        $pedidoProduto->save();

        $this->tester->seeInDatabase('pedido_produto', ['id_produto' => 1, 'estado'=>1, 'quant_Pedida'=>5, 'quant_Entregue'=>2,'preco'=>6.45]);

    }

    public function testDelete(){

        $pedidoProduto = $this->tester->grabRecord('common\models\Pedidoproduto', array('id_produto' => 1, 'estado'=>1, 'quant_Pedida'=>5, 'quant_Entregue'=>2,'preco'=>6.45));

        $pedidoProduto->delete();

        $this->tester->dontSeeRecord('common\models\Pedidoproduto', array('id_produto' => 1, 'estado'=>1, 'quant_Pedida'=>5, 'quant_Entregue'=>2,'preco'=>6.45));

        $pedido = $this->tester->grabRecord('common\models\Pedido', array('id_perfil' => 1, 'nota'=>'Bitoque sem arroz', 'tipo'=>0, 'id_mesa'=>2));
        $pedido->delete();

        $this->tester->dontSeeRecord('common\models\Pedido', array('id_perfil' => 1, 'nota'=>'Bitoque sem arroz', 'tipo'=>0, 'id_mesa'=>2));

    }
}