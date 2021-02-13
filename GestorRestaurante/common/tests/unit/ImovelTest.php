<?php namespace common\tests;

use common\models\Imovel;


class ImovelTest extends \Codeception\Test\Unit
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
    public function testSomeFeature()
    {
        $imovel=new Imovel();

        $imovel->metros='Testeeeee';
        $this->assertFalse($imovel->validate(['metros']));

        $imovel->metros=null;
        $this->assertFalse($imovel->validate(['metros']));

        $imovel->metros=23;
        $this->assertTrue($imovel->validate(['metros']));


        $imovel->localidade=1111111111111;
        $this->assertFalse($imovel->validate(['localidade']));

        $imovel->localidade='kkkkkk kkkkkkkkkkkkkkk kkkkk';
        $this->assertFalse($imovel->validate(['localidade']));

        $imovel->localidade=null;
        $this->assertFalse($imovel->validate(['localidade']));

        $imovel->localidade='Sapataria';
        $this->assertTrue($imovel->validate(['localidade']));

    }

    public function testCreate(){

        $imovel=new Imovel();

        $imovel->metros=20;
        $imovel->localidade='Leiria';

        $imovel->save();

        $this->tester->seeInDatabase('imovel', ['metros' => 20, 'localidade'=>'Leiria']);

    }


    public function testUpdate(){

        $imovel = $this->tester->grabRecord('common\models\Imovel', array('metros' => 20, 'localidade'=>'Leiria'));

        $imovel->metros=40;
        $imovel->localidade='Porto';

        $imovel->save();

        $this->tester->seeInDatabase('imovel', ['metros' => 40, 'localidade'=>'Porto']);

    }


    public function testDelete(){

        $imovel = $this->tester->grabRecord('common\models\Imovel', array('metros' => 40, 'localidade'=>'Porto'));

        $imovel->delete();

        $this->tester->dontSeeRecord('common\models\Imovel', array('metros' => 40, 'localidade'=>'Porto'));

    }
}