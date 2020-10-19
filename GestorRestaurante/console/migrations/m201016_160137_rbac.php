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
            $consultarUtilizadores->createPermission('Consultar utilizadores');
            $auth->add($consultarUtilizadores);

            //# ATUALIZAR #
            $atualizarUtilizadores = $auth->createPermission('atualizarUtilizadores');
            $atualizarUtilizadores->createPermission('Atualizar utilizadores');
            $auth->add($atualizarUtilizadores);

            //# APAGAR #
            $apagarUtilizadores = $auth->createPermission('apagarUtilizadores');
            $apagarUtilizadores->createPermission('Apagar utilizadores');
            $auth->add($apagarUtilizadores);

        /**PERFIS**/

            //# CRIAR #
            $criarPerfis = $auth->createPermission('criarPerfis');
            $criarPerfis->description = 'Criar perfis';
            $auth->add($criarPerfis);

            //# CONSULTAR #
            $consultarPerfis = $auth->createPermission('consultarPerfis');
            $consultarPerfis->createPermission('Consultar perfis');
            $auth->add($consultarPerfis);

            //# ATUALIZAR #
            $atualizarPerfis = $auth->createPermission('atualizarPerfis');
            $atualizarPerfis->createPermission('Atualizar perfis');
            $auth->add($atualizarPerfis);

            //# APAGAR #
            $apagarPerfis = $auth->createPermission('apagarPerfis');
            $apagarPerfis->createPermission('Apagar perfis');
            $auth->add($apagarPerfis);

        /**CARGOS**/

            //# CRIAR #
            $criarCargos = $auth->createPermission('criarCargos');
            $criarCargos->description = 'Criar cargos';
            $auth->add($criarCargos);

            //# CONSULTAR #
            $consultarCargos = $auth->createPermission('consultarCargos');
            $consultarCargos->createPermission('Consultar cargos');
            $auth->add($consultarCargos);

            //# ATUALIZAR #
            $atualizarCargos = $auth->createPermission('atualizarCargos');
            $atualizarCargos->createPermission('Atualizar cargos');
            $auth->add($atualizarCargos);

            //# APAGAR #
            $apagarCargos = $auth->createPermission('apagarCargos');
            $apagarCargos->createPermission('Apagar cargos');
            $auth->add($apagarCargos);

        /**PEDIDOS**/

            //# CRIAR #
            $criarPedidos = $auth->createPermission('criarPedidos');
            $criarPedidos->description = 'Criar pedidos';
            $auth->add($criarPedidos);

            //# CONSULTAR #
            $consultarPedidos = $auth->createPermission('consultarPedidos');
            $consultarPedidos->createPermission('Consultar pedidos');
            $auth->add($consultarPedidos);

            //# ATUALIZAR #
            $atualizarPedidos = $auth->createPermission('atualizarPedidos');
            $atualizarPedidos->createPermission('Atualizar pedidos');
            $auth->add($atualizarPedidos);

            //# APAGAR #
            $apagarPedidos = $auth->createPermission('apagarPedidos');
            $apagarPedidos->createPermission('Apagar pedidos');
            $auth->add($apagarPedidos);

        /**EMENTAS**/

            //# CRIAR #
            $criarEmentas = $auth->createPermission('criarEmentas');
            $criarEmentas->description = 'Criar ementas';
            $auth->add($criarCargos);

            //# CONSULTAR #
            $consultarEmentas = $auth->createPermission('consultarEmentas');
            $consultarEmentas->createPermission('Consultar ementas');
            $auth->add($consultarEmentas);

            //# ATUALIZAR #
            $atualizarEmentas = $auth->createPermission('atualizarEmentas');
            $atualizarEmentas->createPermission('Atualizar ementas');
            $auth->add($atualizarEmentas);

            //# APAGAR #
            $apagarEmentas = $auth->createPermission('apagarEmentas');
            $apagarEmentas->createPermission('Apagar ementas');
            $auth->add($apagarEmentas);

        /**FALTAS**/

            //# CRIAR #
            $criarFaltas = $auth->createPermission('criarFaltas');
            $criarFaltas->description = 'Criar faltas';
            $auth->add($criarFaltas);

            //# CONSULTAR #
            $consultarFaltas = $auth->createPermission('consultarFaltas');
            $consultarFaltas->createPermission('Consultar faltas');
            $auth->add($consultarFaltas);

            //# ATUALIZAR #
            $atualizarFaltas = $auth->createPermission('atualizarFaltas');
            $atualizarFaltas->createPermission('Atualizar faltas');
            $auth->add($atualizarFaltas);

            //# APAGAR #
            $apagarFaltas = $auth->createPermission('apagarFaltas');
            $apagarFaltas->createPermission('Apagar faltas');
            $auth->add($apagarFaltas);

        /**HORARIOS**/

        //# CRIAR #
            $criarHorarios = $auth->createPermission('$criarHorarios');
            $criarHorarios->description = '$Criar horarios';
            $auth->add($criarHorarios);

            //# CONSULTAR #
            $consultarHorarios = $auth->createPermission('consultarHorarios');
            $consultarHorarios->createPermission('Consultar horarios');
            $auth->add($consultarHorarios);

            //# ATUALIZAR #
            $atualizarHorarios = $auth->createPermission('atualizarHorarios');
            $atualizarHorarios->createPermission('Atualizar horarios');
            $auth->add($atualizarHorarios);

            //# APAGAR #
            $apagarHorarios = $auth->createPermission('apagarHorarios');
            $apagarHorarios->createPermission('Apagar horarios');
            $auth->add($apagarHorarios);

        /**Faturas**/

            //# CRIAR #
            $criarFaturas = $auth->createPermission('$criarFaturas');
            $criarFaturas->description = '$Criar faturas';
            $auth->add($criarFaturas);

            //# CONSULTAR #
            $consultarFaturas = $auth->createPermission('consultarFaturas');
            $consultarFaturas->createPermission('Consultar Faturas');
            $auth->add($consultarFaturas);

            //# ATUALIZAR #
            $atualizarFaturas = $auth->createPermission('atualizarFaturas');
            $atualizarFaturas->createPermission('Atualizar faturas');
            $auth->add($atualizarFaturas);

            //# APAGAR #
            $apagarFaturas = $auth->createPermission('apagarFaturas');
            $apagarFaturas->createPermission('Apagar faturas');
            $auth->add($apagarFaturas);

        /**CATEGORIA DE PRATOS**/

            //# CRIAR #
            $criarCategoriaPratos = $auth->createPermission('$criarCategoriaPratos');
            $criarFaturas->description = '$Criar categoria pratos';
            $auth->add($criarCategoriaPratos);

            //# CONSULTAR #
            $consultarCategoriaPratos = $auth->createPermission('consultarCategoriaPratos');
            $consultarCategoriaPratos->createPermission('Consultar categoria pratos');
            $auth->add($consultarCategoriaPratos);

            //# ATUALIZAR #
            $atualizarCategoriaPratos = $auth->createPermission('atualizarCategoriaPratos');
            $atualizarCategoriaPratos->createPermission('Atualizar categoria pratos');
            $auth->add($atualizarCategoriaPratos);

            //# APAGAR #
            $apagarCategoriaPratos = $auth->createPermission('apagarCategoriaPratos');
            $apagarCategoriaPratos->createPermission('Apagar categoria pratos');
            $auth->add($apagarCategoriaPratos);

        /**MESAS**/

            //# CRIAR #
            $criarMesas = $auth->createPermission('$criarMesas');
            $criarMesas->description = '$Criar mesas';
            $auth->add($criarMesas);

            //# CONSULTAR #
            $consultarMesas = $auth->createPermission('consultarMesas');
            $consultarMesas->createPermission('Consultar mesas');
            $auth->add($consultarMesas);

            //# ATUALIZAR #
            $atualizarMesas= $auth->createPermission('atualizarMesas');
            $atualizarMesas->createPermission('Atualizar mesas');
            $auth->add($atualizarMesas);

            //# APAGAR #
            $apagarMesas = $auth->createPermission('apagarMesas');
            $apagarMesas->createPermission('Apagar Mesas');
            $auth->add($apagarMesas);






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

        //# EMENTAS #
        $auth->addChild($gerente, $criarEmentas);
        $auth->addChild($gerente, $consultarEmentas);
        $auth->addChild($gerente, $atualizarEmentas);
        $auth->addChild($gerente, $apagarEmentas);

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

        //# CATEGORIA DE PRATOS #
        $auth->addChild($gerente, $criarCategoriaPratos);
        $auth->addChild($gerente, $consultarCategoriaPratos);
        $auth->addChild($gerente, $atualizarCategoriaPratos);
        $auth->addChild($gerente, $apagarCategoriaPratos);

        //# MESAS #
        $auth->addChild($gerente, $criarMesas);
        $auth->addChild($gerente, $consultarMesas);
        $auth->addChild($gerente, $atualizarMesas);
        $auth->addChild($gerente, $apagarMesas);

        /** ROLE -> ATENDEDOR DE PEDIDOS ________________________________________________________________________**/

            $atendedorPedidos = $auth->createRole('atendedorPedidos');
            $auth->add($atendedorPedidos);

            //# Perfil #
            $auth->addChild($atendedorPedidos, $consultarPerfis);
            $auth->addChild($atendedorPedidos, $atualizarPerfis);

            //# EMENTAS #
            $auth->addChild($atendedorPedidos, $consultarEmentas);

            //# HORARIOS #
            $auth->addChild($atendedorPedidos, $consultarHorarios);

            //# PEDIDOS #

            $auth->addChild($atendedorPedidos, $criarPedidos);
            $auth->addChild($atendedorPedidos, $consultarPedidos);
            $auth->addChild($atendedorPedidos, $atualizarPedidos);
            $auth->addChild($atendedorPedidos, $apagarPedidos);

            //# FALTAS #
            $auth->addChild($atendedorPedidos, $consultarFaltas);


        /**ROLE -> EMPREGADO DE MESA_____________________________________________________________________________**/

            $empregadoMesa = $auth->createRole('empregadoMesa');
            $auth->add($empregadoMesa);

            //# Perfil #
            $auth->addChild($empregadoMesa, $consultarPerfis);
            $auth->addChild($empregadoMesa, $atualizarPerfis);

            //# EMENTAS #
            $auth->addChild($empregadoMesa, $consultarEmentas);

            //# HORARIOS #
            $auth->addChild($empregadoMesa, $consultarHorarios);

            //# PEDIDOS #

            $auth->addChild($empregadoMesa, $criarPedidos);
            $auth->addChild($empregadoMesa, $consultarPedidos);
            $auth->addChild($empregadoMesa, $atualizarPedidos);
            $auth->addChild($empregadoMesa, $apagarPedidos);

            //# FALTAS #
            $auth->addChild($empregadoMesa, $consultarFaltas);

        /**ROLE -> COZINHEIRO____________________________________________________________________________________**/

            $cozinheiro = $auth->createRole('cozinheiro');
            $auth->add($cozinheiro);

            //# Perfil #
            $auth->addChild($cozinheiro, $consultarPerfis);
            $auth->addChild($cozinheiro, $atualizarPerfis);

            //# EMENTAS #
            $auth->addChild($cozinheiro, $criarEmentas);
            $auth->addChild($cozinheiro, $consultarEmentas);
            $auth->addChild($cozinheiro, $atualizarEmentas);
            $auth->addChild($cozinheiro, $apagarEmentas);

            //# HORARIOS #
            $auth->addChild($cozinheiro, $consultarHorarios);

            //# FALTAS #
            $auth->addChild($empregadoMesa, $consultarFaltas);

        /**ROLE -> CLIENTE_______________________________________________________________________________________**/

        //TODO: ATRUBUIR PREMISSÕES AO ADMIN ( GERENTE )

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
