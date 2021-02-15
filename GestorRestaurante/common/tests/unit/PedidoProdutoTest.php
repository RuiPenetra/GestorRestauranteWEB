<?php namespace common\tests;

use common\models\Pedido;
use common\models\PedidoProduto;



class PedidoProdutoTest extends \Codeception\Test\Unit
{
    /**
     * @var \common\tests\UnitTester
     */
    protected $tester;
    protected $ID_USER;
    protected $ID_PEDIDO;
    protected $ID_PRODUTO;
    protected $ID_MESA;

    protected function _before()
    {
        $user = $this->tester->grabRecord('common\models\User', array('username' => 'joana'));
        $this->ID_USER=$user->id;

        $mesa=$this->tester->grabRecord('common\models\Mesa', array('id' => '1'));
        $this->ID_MESA=$mesa->id;

        $produto=$this->tester->grabRecord('common\models\Produto', array('nome' => 'Bitoque'));
        $this->ID_PRODUTO=$produto->id;

        $pedido = new Pedido();
        $pedido->id_perfil=$this->ID_USER;
        $pedido->estado=0;
        $pedido->scenario='scenariorestaurante';
        $pedido->nota='Cozido a portuguesa sem batata';
        $pedido->tipo=0;
        $pedido->data='2021-01-09 06:36:00';
        $pedido->id_mesa=$this->ID_MESA;
        $pedido->save();

        $this->tester->seeInDatabase('pedido', ['id_perfil' => $this->ID_USER, 'nota'=>'Cozido a portuguesa sem batata', 'tipo'=>0, 'id_mesa'=>$this->ID_MESA]);

        $pedido_guardado = $this->tester->grabRecord('common\models\Pedido', array('id_perfil' => $this->ID_USER, 'nota'=>'Cozido a portuguesa sem batata', 'tipo'=>0, 'id_mesa'=>$this->ID_MESA));

        $this->ID_PEDIDO=$pedido_guardado->id;
    }

    protected function _after()
    {

        $pedido_guardado = $this->tester->grabRecord('common\models\Pedido', array('id_perfil' => $this->ID_USER, 'nota'=>'Cozido a portuguesa sem batata', 'tipo'=>0, 'id_mesa'=>$this->ID_MESA));

        $pedido_guardado->delete();

        $this->tester->dontSeeRecord('common\models\Pedido', array('id_perfil' => $this->ID_USER, 'nota'=>'Cozido a portuguesa sem batata', 'tipo'=>0, 'id_mesa'=>$this->ID_MESA));

    }

    // tests
    public function testValidation()
    {

        $pedidoProduto=new PedidoProduto();


        //ID_PEDIDO [ TEXTO ]
        $pedidoProduto->id_pedido='dwdwdwddwd';
        $this->assertFalse($pedidoProduto->validate(['id_pedido']));

        //ID_PEDIDO [ NULL ]
        $pedidoProduto->id_pedido=null;
        $this->assertFalse($pedidoProduto->validate(['id_pedido']));

        //ID_PEDIDO [ INTEIRO ]
        $pedidoProduto->id_pedido=99999;
        $this->assertFalse($pedidoProduto->validate(['id_pedido']));

        //ID_PEDIDO [ EXISTE ]
        $pedidoProduto->id_pedido=$this->ID_PEDIDO;
        $this->assertTrue($pedidoProduto->validate(['id_pedido']));


        //------------------------------------

        //ID_PRODUTO [ TEXTO ]
        $pedidoProduto->id_produto='fefefefe';
        $this->assertFalse($pedidoProduto->validate(['id_produto']));

        //ID_PRODUTO [ NULL ]
        $pedidoProduto->id_produto=null;
        $this->assertFalse($pedidoProduto->validate(['id_produto']));

        //ID_PRODUTO [ INTEIRO ]
        $pedidoProduto->id_produto=2223232;
        $this->assertFalse($pedidoProduto->validate(['id_produto']));

        //ID_PRODUTO [ EXISTE ]
        $pedidoProduto->id_produto=$this->ID_PRODUTO;
        $this->assertTrue($pedidoProduto->validate(['id_produto']));

        //------------------------------------


        //ESTADO [ TEXTO ]
        $pedidoProduto->estado='processo';
        $this->assertFalse($pedidoProduto->validate(['estado']));

        //ESTADO [ NULL ]
        $pedidoProduto->estado=null;
        $this->assertFalse($pedidoProduto->validate(['estado']));

        //ESTADO [ INTEIRO ]
        $pedidoProduto->estado=1;
        $this->assertTrue($pedidoProduto->validate(['estado']));


        //quant_Pedida [ TEXTO ]
        $pedidoProduto->quant_Pedida='testeeeee';
        $this->assertFalse($pedidoProduto->validate(['quant_Pedida']));

        //quant_Pedida [ NULL ]
        $pedidoProduto->quant_Pedida=null;
        $this->assertFalse($pedidoProduto->validate(['quant_Pedida']));

        //quant_Pedida [ INTEIRO ]
        $pedidoProduto->quant_Pedida=4;
        $this->assertTrue($pedidoProduto->validate(['quant_Pedida']));


        $pedidoProduto->quant_Preparacao='feffffff';
        $this->assertFalse($pedidoProduto->validate(['quant_Preparacao']));

        $pedidoProduto->quant_Preparacao=null;
        $this->assertFalse($pedidoProduto->validate(['quant_Preparacao']));

        $pedidoProduto->quant_Preparacao=2;
        $this->assertTrue($pedidoProduto->validate(['quant_Preparacao']));


        $pedidoProduto->quant_Entregue='teste123';
        $this->assertFalse($pedidoProduto->validate(['quant_Entregue']));

        $pedidoProduto->quant_Entregue=null;
        $this->assertFalse($pedidoProduto->validate(['quant_Entregue']));

        $pedidoProduto->quant_Entregue=2;
        $this->assertTrue($pedidoProduto->validate(['quant_Entregue']));


        $pedidoProduto->preco='teste1234343';
        $this->assertFalse($pedidoProduto->validate(['preco']));

        $pedidoProduto->preco=null;
        $this->assertFalse($pedidoProduto->validate(['preco']));

        $pedidoProduto->preco=2.34;
        $this->assertTrue($pedidoProduto->validate(['preco']));

    }


    public function testCreate(){

        $pedido = new Pedido();
        $pedido->id_perfil=$this->ID_USER;
        $pedido->estado=0;
        $pedido->scenario='scenariorestaurante';
        $pedido->nota='Cozido a alentejana';
        $pedido->tipo=0;
        $pedido->data='2021-01-09 06:36:00';
        $pedido->id_mesa=$this->ID_MESA;
        $pedido->save();

        $this->tester->seeInDatabase('pedido', ['id_perfil' => $this->ID_USER, 'nota'=>'Cozido a alentejana', 'tipo'=>0, 'id_mesa'=>$this->ID_MESA]);

        $pedido_guardado = $this->tester->grabRecord('common\models\Pedido', array('id_perfil' => $this->ID_USER, 'nota'=>'Cozido a alentejana', 'tipo'=>0, 'id_mesa'=>$this->ID_MESA));

        $pedidoProduto= new PedidoProduto();

        $pedidoProduto->id_pedido=$pedido_guardado->id;
        $pedidoProduto->id_produto=$this->ID_PRODUTO;
        $pedidoProduto->estado=0;
        $pedidoProduto->quant_Pedida=4;
        $pedidoProduto->quant_Preparacao=0;
        $pedidoProduto->quant_Entregue=0;
        $pedidoProduto->preco=20.45;
        $pedidoProduto->save();

        $this->tester->seeInDatabase('pedido_produto', ['id_produto' => $this->ID_PRODUTO, 'estado'=>0, 'quant_Pedida'=>4, 'quant_Entregue'=>0,'preco'=>20.45]);

    }

    public function testUpdate(){

        $pedidoProduto = $this->tester->grabRecord('common\models\Pedidoproduto', array('id_produto' => $this->ID_PRODUTO, 'estado'=>0, 'quant_Pedida'=>4, 'quant_Entregue'=>0,'preco'=>20.45));
        $pedidoProduto->estado=1;
        $pedidoProduto->quant_Pedida=6;
        $pedidoProduto->quant_Preparacao=3;
        $pedidoProduto->quant_Entregue=2;
        $pedidoProduto->preco=25.45;
        $pedidoProduto->save();

        $this->tester->seeInDatabase('pedido_produto', ['id_produto' => $this->ID_PRODUTO, 'estado'=>1, 'quant_Pedida'=>6, 'quant_Preparacao'=>3, 'quant_Entregue'=>2,'preco'=>25.45]);

    }

    public function testDelete(){

        $pedidoProduto = $this->tester->grabRecord('common\models\Pedidoproduto', array('id_produto' => $this->ID_PRODUTO, 'estado'=>1, 'quant_Pedida'=>6, 'quant_Preparacao'=>3, 'quant_Entregue'=>2,'preco'=>25.45));

        $pedidoProduto->delete();

        $this->tester->dontSeeRecord('common\models\Pedidoproduto', array('id_produto' => $this->ID_PRODUTO, 'estado'=>1, 'quant_Pedida'=>6, 'quant_Preparacao'=>3, 'quant_Entregue'=>2,'preco'=>25.45));

        $pedido_guardado = $this->tester->grabRecord('common\models\Pedido', array('id_perfil' => $this->ID_USER, 'nota'=>'Cozido a alentejana', 'tipo'=>0, 'id_mesa'=>$this->ID_MESA));

        $pedido_guardado->delete();

        $this->tester->dontSeeRecord('common\models\Pedido', array('id_perfil' => $this->ID_USER, 'nota'=>'Cozido a alentejana', 'tipo'=>0, 'id_mesa'=>$this->ID_MESA));

    }
}