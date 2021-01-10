<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class CategoriaProdutoCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/index?r=site%2Flogin');
        $I->fillField('LoginForm[username]', 'joana');
        $I->fillField('LoginForm[password]', 'joana1234567');
        $I->click('login-button');
        $I->see('Painel');
    }

    // tests
    public function CriarCategoriaProdutoTest(FunctionalTester $I)
    {

        $I->wantTo('Criar categoria produto [ Vegetariana ]');
        $I->see('Categorias Produtos','p');
        $I->click(['class' => 'produto-nav']);
        $I->amOnPage('?r=categoriaproduto%2Findex');
        $I->see('Nova categoria');
        $I->fillField('CategoriaProduto[nome]','Vegetariana');
        $I->click('createCategoria-button');

    }

    public function PesquisarNomeTest(FunctionalTester $I){

        $I->wantTo('Pesquisar categoria produto [ Vegetariana ]');
        $I->amOnPage('?r=categoriaproduto%2Findex');
        $I->see('Todas as categorias');
        $I->fillField('CategoriaProdutoSearch[nome]','Vegetariana');
        $I->click('searchCategoria-button');

   }


}
