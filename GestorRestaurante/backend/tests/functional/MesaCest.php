<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class MesaCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/?r=mesa%2Findex');
    }

    // tests
    public function CreateMesaTest(FunctionalTester $I)
    {
        $I->amOnPage('mesa/index');
        $I->wantTo('Create a table');
        $I->fillField('Mesa[id]','50');
        $I->fillField('Mesa[n_lugares]','5');
        $I->click('criar');
    }


    public function PesquisarEstadoTest(FunctionalTester $I)
    {
        $I->amOnPage('mesa/index');
        $I->wantTo('Create a table');
        $I->fillField('Mesa[id]','50');
        $I->fillField('Mesa[n_lugares]','5');
        $I->click('criar');
    }


    public function PesquisarLugaresTest(FunctionalTester $I)
    {
        $I->amOnPage('mesa/index');
        $I->wantTo('Create a table');
        $I->fillField('Mesa[id]','50');
        $I->fillField('Mesa[n_lugares]','5');
        $I->click('criar');
    }

//    public function PesquisarLugaresTest(FunctionalTester $I)
//    {
//        $I->amOnPage('mesa/index');
//        $I->wantTo('Create a table');
//        $I->fillField('Mesa[id]','50');
//        $I->fillField('Mesa[n_lugares]','5');
//        $I->click('criar');
//    }
}
