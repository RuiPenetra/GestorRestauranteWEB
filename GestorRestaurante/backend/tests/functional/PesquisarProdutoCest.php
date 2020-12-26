<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class PesquisarProdutoCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('backend/web/index.php?r=produto%2Findex');
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->amOnPage('produto/index');
        $I->wantTo('Search a product by the name');
        $I->see('Produtos');
        $I->fillField('ProdutoSearch[nome]','Bitoque');
        $I->click('Procurar');
    }

    public function pesquisarpreco(FunctionalTester $I)
    {
        $I->amOnPage('produto/index');
        $I->wantTo('Search a product by the price');
        $I->see('Produtos');
        $I->fillField('ProdutoSearch[preco]','1.78');
        $I->click('Procurar');
    }

    public function pesquisarcategoria(FunctionalTester $I)
    {
        $I->amOnPage('produto/index');
        $I->wantTo('Search a product by the category');
        $I->see('Produtos');
        $I->selectOption('ProdutoSearch[id_categoria]','Carne');
        $I->click('Procurar');
    }
}
