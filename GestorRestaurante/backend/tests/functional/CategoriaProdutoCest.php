<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class CategoriaProdutoCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('/index?r=site%2Flogin');
        $I->fillField('LoginForm[username]', 'joana');
        $I->fillField('LoginForm[password]', '1234567');
        $I->click('login-button');
        $I->see('Painel');
    }

    // tests
    public function CreateCategoriaProdutoTest(FunctionalTester $I)
    {
/*        $I->amOnPage('/index?r=site%2Fpainel');
        $I->see('Utilizadores','div');
        $I->click('btn-user');
        $I->see('Procurar Produtos');
        $I->click('btn-create-user');
        $I->see('Utilizadores','h1');
        $I->see('Novo','div');
        $I->click('createUser-button');
        $I->fillField('SignupForm[nome]', 'joana');
        $I->fillField('SignupForm[apelido]', 'joana');
        $I->fillField('SignupForm[morada]', 'joana');
        $I->fillField('User[codigopostal]', 'joana');
        $I->fillField('User[datanascimento]', 'joana');
        $I->fillField('User[username]', 'joana');*/


        /*  $I->amOnPage('produto/create');
          $I->wantTo('Insert a product');
          $I->fillField('Produto[nome]','Bacalhau com natas');
          $I->fillField('Produto[preco]','5.00');
          $I->selectOption('Produto[id_categoria]','Peixe');
          $I->fillField('Produto[ingredientes]','Bacalhau,natas,batatas');
          $I->click('login-button');*/


    }

    public function PesquisarNomeTest(FunctionalTester $I){


    }

    public function VerProdutoAssociadoCategoriaTest(FunctionalTester $I){


    }

}
