<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class CriarProdutoCest
{
    public function _before(FunctionalTester $I)
    {

    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->amLoggedInAs(4);
        $I->amOnPage('produto/create');
        $I->wantTo('Insert a product');
        $I->fillField('Produto[nome]','Bacalhau com natas');
        $I->fillField('Produto[preco]','5.00');
        $I->selectOption('Produto[id_categoria]','Peixe');
        $I->fillField('Produto[ingredientes]','Bacalhau,natas,batatas');
        $I->click('login-button');


    }
}
