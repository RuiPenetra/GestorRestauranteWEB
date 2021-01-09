<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class MesaCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('?r=site%2Flogin');
        $I->fillField('LoginForm[username]', 'joana');
        $I->fillField('LoginForm[password]', 'joana1234567');
        $I->click('login-button');
        $I->see('Painel');
    }

    // tests
    public function CreateMesaTest(FunctionalTester $I)
    {
        $I->wantTo('Criar mesa');
        $I->amOnPage('?r=site%2Findex');
        $I->see('Mesas','div');
        $I->click(['class' => 'mesa-nav']);
        $I->amOnPage('?r=mesa%2Findex');
        $I->see('Criar mesa','div');
        $I->fillField('Mesa[id]','50');
        $I->fillField('Mesa[n_lugares]','5');
        $I->click('mesa-button');
    }


    public function PesquisarMesaTest(FunctionalTester $I)
    {
        $I->wantTo('Pesquisar mesa criada');
        $I->amOnPage('?r=mesa%2Findex');
        $I->fillField('MesaSearch[id]','50');
        $I->fillField('MesaSearch[n_lugares]','5');
        $I->click('searchMesa-button');
    }


/*    public function EditarMesaTest(FunctionalTester $I)
    {
        $I->wantTo('Create a table');
        $I->see('.mesa-id');
        $I->click('btn-mesa-edit','.a');
        $I->amOnPage('?r=mesa%2Fupdate&id=50');
        $I->fillField('Mesa[n_lugares]','8');
        $I->click('mesa-button');
    }*/


}
