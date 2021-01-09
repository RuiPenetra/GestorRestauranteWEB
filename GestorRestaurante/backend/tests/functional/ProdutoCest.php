<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class ProdutoCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('LoginForm[username]', 'joana');
        $I->fillField('LoginForm[password]', '1234567');
        $I->click('login-button');
        $I->see('Painel');

    }

    // tests
    public function PesquisaNomeTest(FunctionalTester $I)
    {
        $I->wantTo('Pesquisar produto por nome [ Bitoque ]');
        $I->see('Produtos','p');
        $I->click(['class' => 'produto-nav']);
        $I->amOnPage('?r=produto%2Findex');
        $I->see('Produtos');
        $I->fillField('ProdutoSearch[nome]','Bitoque');
        $I->click('Procurar');
        $I->see('Bitoque','.product-title');

    }

    public function PesquisaPrecoTest(FunctionalTester $I)
    {
        $I->wantTo('Pesquisar produto por preco [ 6.50 ]');
        $I->amOnPage('/index.php?r=produto%2Findex');
        $I->see('Produtos');
        $I->fillField('ProdutoSearch[preco]','6.50');
        $I->click('Procurar');
        $I->see('6.50','span');
    }

    public function DesativarProdutoTest(FunctionalTester $I)
    {
        $I->wantTo('Desativar produto [ Mousse de chocolate ]');
        $I->amOnPage('/index.php?r=produto%2Findex');
        $I->see('Produtos');
        $I->fillField('ProdutoSearch[nome]','Mousse de chocolate');
        $I->click('Procurar');
        $I->click(['class' => 'btn-danger']);
        $I->seeElement('.modal');
        $I->see('Tem a certeza que quer apagar?');
        $I->click(['class' => 'btn-outline-success']);
    }
}
