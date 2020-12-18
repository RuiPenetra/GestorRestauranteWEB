<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class CriarProdutoCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('backend/web/index.php?r=produto%2Fcreate');
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->wantTo('Insert a product');
        $I->see('Create Produto');
        $I->fillField('produto-nome','Bacalhau com natas');
        $I->fillField('Produto[preco]','5.00');
        $I->selectOption('Produto[id_categoria]','Peixe');
        $I->fillField('Produto[ingredientes]','Bacalhau,natas,batatas');
        $I->click('login-button');


    }
}
