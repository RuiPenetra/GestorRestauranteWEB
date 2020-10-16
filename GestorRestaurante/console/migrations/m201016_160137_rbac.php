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
