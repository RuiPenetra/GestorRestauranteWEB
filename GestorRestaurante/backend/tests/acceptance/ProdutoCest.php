<?php namespace backend\tests\acceptance;
use backend\tests\AcceptanceTester;

class ProdutoCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->wantTo('Login do utilizador');
        $I->amOnPage('/');
        $I->fillField('LoginForm[username]', 'joana');
        $I->fillField('LoginForm[password]', 'joana1234567');
        $I->click('login-button');
        //$I->amOnPage('web/index.php?r=user%index');
        $I->wait(4);
        $I->see('Painel');
        $I->click(['class' => 'btn-produto']);
        //$I->amLoggedInAs(2);
    }

    // tests
    public function CreateProdutoTest(AcceptanceTester $I)
    {

        $I->wantTo('Criar um produto');
        //$I->amOnPage('/index.php?r=produto%2Findex');
        $I->see('Produtos');
        $I->wait(4);
        /*$I->click(['class' => 'nav-link produtos']);*/
        $I->see('Procurar Produtos');
        $I->click(['class' => 'novo-produto']);
        $I->wait(4);
        $I->see('Criar Produto');
        $I->fillField('Produto[nome]', 'Farinheira');
        $I->fillField('Produto[preco]', '4,44');
        $I->selectOption('Produto[id_categoria]','Carne');
        $I->click('create-button');
        $I->wait(4);
        $I->see('Produto criado com sucesso');

    }
}
