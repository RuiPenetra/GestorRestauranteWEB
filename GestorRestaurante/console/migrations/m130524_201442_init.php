<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%utilizador}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull()->unique(),
            'morada' => $this->string(255)->notNull(),
            'nome' => $this->string(255)->notNull(),
            'apelido' => $this->string(255)->notNull(),
            'datanascimento' => $this->date()->notNull(),
            'nacionalidade' => $this->string(255)->notNull(),
            'telemovel' => $this->string(22)->notNull(),
            'codigopostal' => $this->string()->notNull(),
            'genero' => $this->tinyInteger()->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string(255)->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->string(255)->notNull(),
            'updated_at' => $this->string(255)->notNull(),
        ], $tableOptions);

        $this->createTable('{{%perfil}}', [
            'id_user' => $this->primaryKey(),
            'nome' => $this->string(255)->notNull(),
            'apelido' => $this->string(255)->notNull(),
            'morada' => $this->string(255)->notNull(),
            'datanascimento' => $this->date()->notNull(),
            'nacionalidade' => $this->string(255)->notNull(),
            'telemovel' => $this->string(22)->notNull(),
            'codigopostal' => $this->string()->notNull(),
            'genero' => $this->tinyInteger()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%utilizador}}');
    }
}
