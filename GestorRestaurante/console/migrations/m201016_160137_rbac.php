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
