<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class UserCest
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
    public function CreateUserTest(FunctionalTester $I)
    {
        $I->wantTo('Criar novo utilizador');
        $I->see('Utilizadores','div');
        $I->click(['class' => 'user-nav']);
        $I->see('Novo');
        $I->click(['class' => 'createUser-button']);
        $I->fillField('SignupForm[nome]', 'Afonso');
        $I->fillField('SignupForm[apelido]', 'Manuel');
        $I->fillField('SignupForm[morada]', 'Rua do Tascao');
        $I->fillField('SignupForm[codigopostal]', '2569-499');
        $I->fillField('SignupForm[datanascimento]', '08/12/2020');
        $I->fillField('SignupForm[nacionalidade]', 'Portuguesa');
        $I->fillField('SignupForm[telemovel]', '9199999');
        $I->selectOption('SignupForm[genero]', 'Masculino');
        $I->selectOption('SignupForm[cargo]','Empregado Mesa');
        $I->fillField('SignupForm[username]', 'Afonso');
        $I->fillField('SignupForm[email]', 'Afonso@gmail.com');
        $I->fillField('SignupForm[password]', 'afonso1234567');
        $I->click('create-button');
        $I->see('Lista Utilizadores');
    }
}
