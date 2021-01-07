<?php

use yii\db\Migration;

/**
 * Class m201016_160137_rbac
 */
class m201016_160137_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        //TODO: CRIAR PREMISSOES

        /**UTILIZADORES*/

            //# CRIAR #
            $criarUtilizadores = $auth->createPermission('criarUtilizadores');
            $criarUtilizadores->description = 'Criar utilizadores';
            $auth->add($criarUtilizadores);

            //# CONSULTAR #
            $consultarUtilizadores = $auth->createPermission('consultarUtilizadores');
            $consultarUtilizadores->description ='Consultar utilizadores';
            $auth->add($consultarUtilizadores);

            //# ATUALIZAR #
            $atualizarUtilizadores = $auth->createPermission('atualizarUtilizadores');
            $atualizarUtilizadores->description='Atualizar utilizadores';
            $auth->add($atualizarUtilizadores);

            //# APAGAR #
            $apagarUtilizadores = $auth->createPermission('apagarUtilizadores');
            $apagarUtilizadores->description='Apagar utilizadores';
            $auth->add($apagarUtilizadores);




        /**PERFIS**/

            //# CRIAR #
            $criarPerfis = $auth->createPermission('criarPerfis');
            $criarPerfis->description = 'Criar perfis';
            $auth->add($criarPerfis);

            //# CONSULTAR #
            $consultarPerfis = $auth->createPermission('consultarPerfis');
            $consultarPerfis->description = 'Consultar perfis';
            $auth->add($consultarPerfis);

            //# ATUALIZAR #
            $atualizarPerfis = $auth->createPermission('atualizarPerfis');
            $atualizarPerfis->description ='Atualizar perfis';
            $auth->add($atualizarPerfis);

            //# APAGAR #
            $apagarPerfis = $auth->createPermission('apagarPerfis');
            $apagarPerfis->description = 'Apagar perfis';
            $auth->add($apagarPerfis);

        /**CARGOS**/

            //# CRIAR #
            $criarCargos = $auth->createPermission('criarCargos');
            $criarCargos->description = 'Criar cargos';
            $auth->add($criarCargos);

            //# CONSULTAR #
            $consultarCargos = $auth->createPermission('consultarCargos');
            $consultarCargos->description = 'Consultar cargos';
            $auth->add($consultarCargos);

            //# ATUALIZAR #
            $atualizarCargos = $auth->createPermission('atualizarCargos');
            $atualizarCargos->description = 'Atualizar cargos';
            $auth->add($atualizarCargos);

            //# APAGAR #
            $apagarCargos = $auth->createPermission('apagarCargos');
            $apagarCargos->description = 'Apagar cargos';
            $auth->add($apagarCargos);

        /**PEDIDOS**/

            //# CRIAR #
            $criarPedidos = $auth->createPermission('criarPedidos');
            $criarPedidos->description = 'Criar pedidos';
            $auth->add($criarPedidos);

            //# CONSULTAR #
            $consultarPedidos = $auth->createPermission('consultarPedidos');
            $consultarPedidos->description = 'Consultar pedidos';
            $auth->add($consultarPedidos);

            //# ATUALIZAR #
            $atualizarPedidos = $auth->createPermission('atualizarPedidos');
            $atualizarPedidos->description = 'Atualizar pedidos';
            $auth->add($atualizarPedidos);

            //# APAGAR #
            $apagarPedidos = $auth->createPermission('apagarPedidos');
            $apagarPedidos->description = 'Apagar pedidos';
            $auth->add($apagarPedidos);

        /**PRODUTO**/

            //# CRIAR #
            $criarProdutos = $auth->createPermission('criarProdutos');
            $criarProdutos->description = 'Criar Produtos';
            $auth->add($criarProdutos);

            //# CONSULTAR #
            $consultarProdutos = $auth->createPermission('consultarProdutos');
            $consultarProdutos->description = 'Consultar Produtos';
            $auth->add($consultarProdutos);

            //# ATUALIZAR #
            $atualizarProdutos = $auth->createPermission('atualizarProdutos');
            $atualizarProdutos->description = 'Atualizar Produtos';
            $auth->add($atualizarProdutos);

            //# APAGAR #
            $apagarProdutos = $auth->createPermission('apagarProdutos');
            $apagarProdutos->description = 'Apagar Produtos';
            $auth->add($apagarProdutos);

        /**FALTAS**/

            //# CRIAR #
            $criarFaltas = $auth->createPermission('criarFaltas');
            $criarFaltas->description = 'Criar faltas';
            $auth->add($criarFaltas);

            //# CONSULTAR #
            $consultarFaltas = $auth->createPermission('consultarFaltas');
            $consultarFaltas->description = 'Consultar faltas';
            $auth->add($consultarFaltas);

            //# ATUALIZAR #
            $atualizarFaltas = $auth->createPermission('atualizarFaltas');
            $atualizarFaltas->description = 'Atualizar faltas';
            $auth->add($atualizarFaltas);

            //# APAGAR #
            $apagarFaltas = $auth->createPermission('apagarFaltas');
            $apagarFaltas->description = 'Apagar faltas';
            $auth->add($apagarFaltas);

        /**HORARIOS**/

        //# CRIAR #
            $criarHorarios = $auth->createPermission('criarHorarios');
            $criarHorarios->description = 'Criar horarios';
            $auth->add($criarHorarios);

            //# CONSULTAR #
            $consultarHorarios = $auth->createPermission('consultarHorarios');
            $consultarHorarios->description = 'Consultar horarios';
            $auth->add($consultarHorarios);

            //# ATUALIZAR #
            $atualizarHorarios = $auth->createPermission('atualizarHorarios');
            $atualizarHorarios->description = 'Atualizar horarios';
            $auth->add($atualizarHorarios);

            //# APAGAR #
            $apagarHorarios = $auth->createPermission('apagarHorarios');
            $apagarHorarios->description = 'Apagar horarios';
            $auth->add($apagarHorarios);

        /**Faturas**/

            //# CRIAR #
            $criarFaturas = $auth->createPermission('criarFaturas');
            $criarFaturas->description = 'Criar faturas';
            $auth->add($criarFaturas);

            //# CONSULTAR #
            $consultarFaturas = $auth->createPermission('consultarFaturas');
            $consultarFaturas->description = 'Consultar Faturas';
            $auth->add($consultarFaturas);

            //# ATUALIZAR #
            $atualizarFaturas = $auth->createPermission('atualizarFaturas');
            $atualizarFaturas->description = 'Atualizar faturas';
            $auth->add($atualizarFaturas);

            //# APAGAR #
            $apagarFaturas = $auth->createPermission('apagarFaturas');
            $apagarFaturas->description = 'Apagar faturas';
            $auth->add($apagarFaturas);

        /**CATEGORIA DE PRODUTOS**/

            //# CRIAR #
            $criarCategoriaProdutos = $auth->createPermission('criarCategoriaProdutos');
            $criarCategoriaProdutos->description = 'Criar Categoria Produtos';
            $auth->add($criarCategoriaProdutos);

            //# CONSULTAR #
            $consultarCategoriaProdutos = $auth->createPermission('consultarCategoriaProdutos');
            $consultarCategoriaProdutos->description = 'Consultar Categoria Produtos';
            $auth->add($consultarCategoriaProdutos);

            //# ATUALIZAR #
            $atualizarCategoriaProdutos = $auth->createPermission('atualizarCategoriaProdutos');
            $atualizarCategoriaProdutos->description ='Atualizar Categoria Produtos';
            $auth->add($atualizarCategoriaProdutos);

            //# APAGAR #
            $apagarCategoriaProdutos = $auth->createPermission('apagarCategoriaProdutos');
            $apagarCategoriaProdutos->description ='Apagar Categoria Produtos';
            $auth->add($apagarCategoriaProdutos);

        /**MESAS**/

            //# CRIAR #
            $criarMesas = $auth->createPermission('criarMesas');
            $criarMesas->description = 'Criar Mesas';
            $auth->add($criarMesas);

            //# CONSULTAR #
            $consultarMesas = $auth->createPermission('consultarMesas');
            $consultarMesas->description= 'Consultar Mesas';
            $auth->add($consultarMesas);

            //# ATUALIZAR #
            $atualizarMesas= $auth->createPermission('atualizarMesas');
            $atualizarMesas->description= 'Atualizar Mesas';
            $auth->add($atualizarMesas);

            //# APAGAR #
            $apagarMesas = $auth->createPermission('apagarMesas');
            $apagarMesas->description='Apagar Mesas';
            $auth->add($apagarMesas);

        /**RESERVA**/

            //# CRIAR #
            $criarReservas = $auth->createPermission('criarReservas');
            $criarReservas->description = 'Criar Reservas';
            $auth->add($criarReservas);

            //# CONSULTAR #
            $consultarReservas = $auth->createPermission('consultarReservas');
            $consultarReservas->description= 'Consultar Reservas';
            $auth->add($consultarReservas);

            //# ATUALIZAR #
            $atualizarReservas= $auth->createPermission('atualizarReservas');
            $atualizarReservas->description = 'Atualizar Reservas';
            $auth->add($atualizarReservas);

            //# APAGAR #
            $apagarReservas= $auth->createPermission('apagarReservas');
            $apagarReservas->description ='Apagar Reservas';
            $auth->add($apagarReservas);

        /**PEDIDO-PRODUTO**/

            //# CRIAR #
            $criarPedidoProduto = $auth->createPermission('criarPedidoProduto');
            $criarPedidoProduto->description = 'Criar Pedido Produto';
            $auth->add($criarPedidoProduto);

            //# CONSULTAR #
            $consultarPedidoProduto= $auth->createPermission('consultarPedidoProduto');
            $consultarPedidoProduto->description = 'Consultar Pedido Produto';
            $auth->add($consultarPedidoProduto);

            //# ATUALIZAR #
            $atualizarPedidoProduto= $auth->createPermission('atualizarPedidoProduto');
            $atualizarPedidoProduto->description = 'Atualizar Pedido Produto';
            $auth->add($atualizarPedidoProduto);

            //# APAGAR #
            $apagarPedidoProduto= $auth->createPermission('apagarPedidoProduto');
            $apagarPedidoProduto->description='Apagar Pedido Produto';
            $auth->add($apagarPedidoProduto);

        /**PRODUTO-CATEGORIA-PRODUTO**/

            //# CRIAR #
            $criarProdutoCategoriaProduto = $auth->createPermission('criarProdutoCategoriaProduto');
            $criarProdutoCategoriaProduto->description = 'Criar Produto Categoria Produto';
            $auth->add($criarProdutoCategoriaProduto);

            //# CONSULTAR #
            $consultarProdutoCategoriaProduto= $auth->createPermission('consultarProdutoCategoriaProduto');
            $consultarProdutoCategoriaProduto->description = 'Consultar Produto Categoria Produto';
            $auth->add($consultarProdutoCategoriaProduto);

            //# ATUALIZAR #
            $atualizarProdutoCategoriaProduto= $auth->createPermission('atualizarProdutoCategoriaProduto');
            $atualizarProdutoCategoriaProduto->description = 'Atualizar Produto Categoria Produto';
            $auth->add($atualizarProdutoCategoriaProduto);

            //# APAGAR #
            $apagarProdutoCategoriaProduto = $auth->createPermission('apagarProdutoCategoriaProduto');
            $apagarProdutoCategoriaProduto->description = 'Apagar Produto Categoria Produto';
            $auth->add($apagarProdutoCategoriaProduto);

            /**TAKEAWAY **/
            //# CRIAR #
            $criarTakeaway = $auth->createPermission('criarTakeaway');
            $criarTakeaway->description='Criar Takeaway';
            $auth->add($criarTakeaway);

            //#CONSULTAR #
            $consultarTakeaway = $auth->createPermission('consultarTakeaway');
            $consultarTakeaway->description='Consultar Takeaway';
            $auth->add($consultarTakeaway);

            //#ATUALIZAR #
            $atualizarTakeaway = $auth->createPermission('atualizarTakeaway');
            $atualizarTakeaway->description='Atualizar Takeaway';
            $auth->add($atualizarTakeaway);

            //# APAGAR #
            $apagarTakeaway= $auth->createPermission('apagarTakeaway');
            $apagarTakeaway->description="Apagar Takeaway";
            $auth->add($apagarTakeaway);

        //TODO: CRIAR ROLE E ATRIBUIR PREMISSÕES

        /**ROLE -> ADMIN__________________________________________________________________________**/
        $gerente = $auth->createRole('gerente');
        $auth->add($gerente);



            //# UTILIZADORES #
            $auth->addChild($gerente, $criarUtilizadores);
            $auth->addChild($gerente, $consultarUtilizadores);
            $auth->addChild($gerente, $atualizarUtilizadores);
            $auth->addChild($gerente, $apagarUtilizadores);

            //# PERFIS #
            $auth->addChild($gerente, $criarPerfis);
            $auth->addChild($gerente, $consultarPerfis);
            $auth->addChild($gerente, $atualizarPerfis);
            $auth->addChild($gerente, $apagarPerfis);

            //# CARGOS #
            $auth->addChild($gerente, $criarCargos); //[ AINDA A VER SE IRA CRIAR]
            $auth->addChild($gerente, $consultarCargos);
            $auth->addChild($gerente, $atualizarCargos);
            $auth->addChild($gerente, $apagarCargos); //[ AINDA A VER SE IRA CRIAR]

            //# PEDIDOS #
            $auth->addChild($gerente, $criarPedidos);
            $auth->addChild($gerente, $consultarPedidos);
            $auth->addChild($gerente, $atualizarPedidos);
            $auth->addChild($gerente, $apagarPedidos);

            //# PRODUTOS #
            $auth->addChild($gerente, $criarProdutos);
            $auth->addChild($gerente, $consultarProdutos);
            $auth->addChild($gerente, $atualizarProdutos);
            $auth->addChild($gerente, $apagarProdutos);

            //# FALTAS #
            $auth->addChild($gerente, $criarFaltas);
            $auth->addChild($gerente, $consultarFaltas);
            $auth->addChild($gerente, $atualizarFaltas);
            $auth->addChild($gerente, $apagarFaltas);

            //# HORARIOS #
            $auth->addChild($gerente, $criarHorarios);
            $auth->addChild($gerente, $consultarHorarios);
            $auth->addChild($gerente, $atualizarHorarios);
            $auth->addChild($gerente, $apagarHorarios);

            //# FATURAS #
            $auth->addChild($gerente, $criarFaturas);
            $auth->addChild($gerente, $consultarFaturas);
            $auth->addChild($gerente, $atualizarFaturas);
            $auth->addChild($gerente, $apagarFaturas);

            //# CATEGORIA DE Produtos #
            $auth->addChild($gerente, $criarCategoriaProdutos);
            $auth->addChild($gerente, $consultarCategoriaProdutos);
            $auth->addChild($gerente, $atualizarCategoriaProdutos);
            $auth->addChild($gerente, $apagarCategoriaProdutos);

            //# MESAS #
            $auth->addChild($gerente, $criarMesas);
            $auth->addChild($gerente, $consultarMesas);
            $auth->addChild($gerente, $atualizarMesas);
            $auth->addChild($gerente, $apagarMesas);

            //# PEDIDO-PRODUTO #
            $auth->addChild($gerente, $criarPedidoProduto);
            $auth->addChild($gerente, $consultarPedidoProduto);
            $auth->addChild($gerente, $atualizarPedidoProduto);
            $auth->addChild($gerente, $apagarPedidoProduto);

            //# PRODUTO-CATEGORIA-PRODUTO #
            $auth->addChild($gerente, $criarProdutoCategoriaProduto);
            $auth->addChild($gerente, $consultarProdutoCategoriaProduto);
            $auth->addChild($gerente, $atualizarProdutoCategoriaProduto);
            $auth->addChild($gerente, $apagarProdutoCategoriaProduto);

            //# TAKEAWAY #
            $auth->addChild($gerente, $criarTakeaway);
            $auth->addchild($gerente, $consultarTakeaway);
            $auth->addChild($gerente, $atualizarTakeaway);
            $auth->addchild($gerente, $apagarTakeaway);

        /** ROLE -> ATENDEDOR DE PEDIDOS ________________________________________________________________________**/

            $atendedorPedidos = $auth->createRole('atendedorPedidos');
            $auth->add($atendedorPedidos);

            //# PERFIS #
            $auth->addChild($atendedorPedidos, $consultarPerfis);
            $auth->addChild($atendedorPedidos, $atualizarPerfis);

            //# PRODUTOS #
            $auth->addChild($atendedorPedidos, $consultarProdutos);

            //# HORARIOS #
            $auth->addChild($atendedorPedidos, $consultarHorarios);

            //# FALTAS #
            $auth->addChild($atendedorPedidos, $consultarFaltas);

            //# MESAS #
            $auth->addChild($atendedorPedidos, $consultarMesas);

            //# PEDIDOS #
            $auth->addChild($atendedorPedidos, $criarPedidos);
            $auth->addChild($atendedorPedidos, $consultarPedidos);
            $auth->addChild($atendedorPedidos, $atualizarPedidos);
            $auth->addChild($atendedorPedidos, $apagarPedidos);

            //# PEDIDO-PRODUTO #
            $auth->addChild($atendedorPedidos, $criarPedidoProduto);
            $auth->addChild($atendedorPedidos, $consultarPedidoProduto);
            $auth->addChild($atendedorPedidos, $atualizarPedidoProduto);
            $auth->addChild($atendedorPedidos, $apagarPedidoProduto);

            //# RESERVAS #
            $auth->addChild($atendedorPedidos, $criarReservas);
            $auth->addChild($atendedorPedidos, $consultarReservas);
            $auth->addChild($atendedorPedidos, $atualizarReservas);
            $auth->addChild($atendedorPedidos, $apagarReservas);

            //# FATURAS #
            $auth->addChild($atendedorPedidos, $criarFaturas);
            $auth->addChild($atendedorPedidos, $consultarFaturas);
            $auth->addChild($atendedorPedidos, $atualizarFaturas);
            $auth->addChild($atendedorPedidos, $apagarFaturas);



        /**ROLE -> EMPREGADO DE MESA_____________________________________________________________________________**/

            $empregadoMesa = $auth->createRole('empregadoMesa');
            $auth->add($empregadoMesa);



            //# Perfil #
            $auth->addChild($empregadoMesa, $consultarPerfis);
            $auth->addChild($empregadoMesa, $atualizarPerfis);

            //# PRODUTOS #
            $auth->addChild($empregadoMesa, $consultarProdutos);

            //# FALTAS #
            $auth->addChild($empregadoMesa, $consultarFaltas);

            //# MESAS #
            $auth->addChild($empregadoMesa, $consultarMesas);

            //# HORARIOS #
            $auth->addChild($empregadoMesa, $consultarHorarios);

            //# PEDIDOS #
            $auth->addChild($empregadoMesa, $criarPedidos);
            $auth->addChild($empregadoMesa, $consultarPedidos);
            $auth->addChild($empregadoMesa, $atualizarPedidos);
            $auth->addChild($empregadoMesa, $apagarPedidos);

            //# PEDIDO-PRODUTO #
            $auth->addChild($empregadoMesa, $criarPedidoProduto);
            $auth->addChild($empregadoMesa, $consultarPedidoProduto);
            $auth->addChild($empregadoMesa, $atualizarPedidoProduto);
            $auth->addChild($empregadoMesa, $apagarPedidoProduto);

            //# RESERVAS #
            $auth->addChild($empregadoMesa, $criarReservas);
            $auth->addChild($empregadoMesa, $consultarReservas);
            $auth->addChild($empregadoMesa, $atualizarReservas);
            $auth->addChild($empregadoMesa, $apagarReservas);

            //# FATURAS #
            $auth->addChild($empregadoMesa, $criarFaturas);
            $auth->addChild($empregadoMesa, $consultarFaturas);
            $auth->addChild($empregadoMesa, $atualizarFaturas);
            $auth->addChild($empregadoMesa, $apagarFaturas);


        /**ROLE -> COZINHEIRO____________________________________________________________________________________**/

            $cozinheiro = $auth->createRole('cozinheiro');
            $auth->add($cozinheiro);


        //# Perfil #
            $auth->addChild($cozinheiro, $consultarPerfis);
            $auth->addChild($cozinheiro, $atualizarPerfis);

            //# PRODUTOS #
            $auth->addChild($cozinheiro, $criarProdutos);
            $auth->addChild($cozinheiro, $consultarProdutos);
            $auth->addChild($cozinheiro, $atualizarProdutos);
            $auth->addChild($cozinheiro, $apagarProdutos);

            //# HORARIOS #
            $auth->addChild($cozinheiro, $consultarHorarios);

            //# FALTAS #
            $auth->addChild($cozinheiro, $consultarFaltas);

            //# CATEGORIA DE PRODUTOS #
            $auth->addChild($cozinheiro, $criarCategoriaProdutos);
            $auth->addChild($cozinheiro, $consultarCategoriaProdutos);
            $auth->addChild($cozinheiro, $atualizarCategoriaProdutos);
            $auth->addChild($cozinheiro, $apagarCategoriaProdutos);

            //# PRODUTO-CATEGORIA-PRODUTO #
            $auth->addChild($cozinheiro, $criarProdutoCategoriaProduto);
            $auth->addChild($cozinheiro, $consultarProdutoCategoriaProduto);
            $auth->addChild($cozinheiro, $atualizarProdutoCategoriaProduto);
            $auth->addChild($cozinheiro, $apagarProdutoCategoriaProduto);

            //# PEDIDOS #
          $auth->addChild($cozinheiro, $consultarPedidos);

            //# PEDIDO-PRODUTO #
          $auth->addChild($cozinheiro, $consultarPedidoProduto);
          $auth->addChild($cozinheiro, $atualizarPedidoProduto);


        /**ROLE -> CLIENTE_______________________________________________________________________________________**/

            $cliente = $auth->createRole('cliente');
            $auth->add($cliente);


        //# Perfil #
            $auth->addChild($cliente, $consultarPerfis);
            $auth->addChild($cliente, $atualizarPerfis);

            //# PRODUTOS #
            $auth->addChild($cliente, $consultarProdutos);

            //#TAKEAWAY #
            $auth->addChild($cliente, $criarTakeaway);
            $auth->addChild($cliente, $consultarTakeaway);
            $auth->addchild($cliente, $atualizarTakeaway);
            $auth->addchild($cliente, $apagarTakeaway);
            

        //TODO: ATRUBUIR PREMISSÕES AO ADMIN ( GERENTE )

            $auth->assign($gerente, 1);

        //TODO: ASSINAR O PRIMEIRO UTILIZADOR INSERIDO NA BASE DE DADOS, ATRIBUINDO AS PREMISSÕES DE ADMIN (GERENTE)


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201016_160137_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201016_160137_rbac cannot be reverted.\n";

        return false;
    }
    */
}
