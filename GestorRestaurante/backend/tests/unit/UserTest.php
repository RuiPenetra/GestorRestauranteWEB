<?php namespace backend\tests;

use common\models\Mesa;
use common\models\Produto;
use common\models\User;

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $user;
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    //****** UNITARIOS *********//
    public function testValidation()
    {
        $user = new Mesa();

        $user->id='1a';
        $this->assertFalse($user->validate(['id']));

        $user->id=null;
        $this->assertFalse($user->validate(['id']));

        $user->id=2;
        $this->assertTrue($user->validate(['id']));

    }

    //****** INTEGRAÇÃO *********//
    public function testCreate(){

        $user = new Mesa();
        $user->id=2;
        $user->n_lugares=2;
        $user->estado=0;
        $user->save();

//        $this->assertEquals('Miles Davis', $user->getFullName());
        $this->tester->seeInDatabase('mesa', ['id' => '2', 'n_lugares' => '2', 'estado' => '0']);

    }

    public function testUpdate(){

        $user=Mesa::findOne(['id'=>'2']);       //pesquisar com o grabRecord

        $user->estado=1;
        $user->save();

//        $this->assertEquals('Miles Davis', $user->getFullName());
        $this->tester->seeInDatabase('mesa', ['id' => '2', 'estado' => '1']);

    }

   /* public function testDeleteUser(){

        $user= $this->tester->haveRecord('user', [
            'username' => 'AnibalPedro',
            'email' => 'anibalpedro@gmail.com',
        ]);

        $this->$user->delete();

        $this->tester->dontSeeInDatabase('user', ['username' => 'AnibalPedro', 'email' => 'anibalpedro@gmail.com']);

    }*/

}