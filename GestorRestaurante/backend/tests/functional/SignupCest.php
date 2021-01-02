<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class SignupCest
{
    public function _before(FunctionalTester $I)
    {

    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {

        $I->amOnRoute('user/create');
        $I->fillField('SignupForm[nome]', 'Rui');
        $I->fillField('SignupForm[apelido]', 'Penetra');
        $I->fillField('SignupForm[morada]', 'Rua do Tascao');
        $I->fillField('SignupForm[codigopostal]', '2569-499');
        $I->fillField('SignupForm[datanascimento]', '08/12/2020');
        $I->fillField('SignupForm[nacionalidade]', 'Portuguesa');
        $I->fillField('SignupForm[telemovel]', '919999998');
        $I->selectOption('SignupForm[genero]', 'Masculino');
        $I->selectoption('SignupForm[cargo]', 'Cliente');
        $I->fillField('SignupForm[username]', 'Popito');
        $I->fillField('SignupForm[email]', 'Popito@gmail.com');
        $I->fillField('SignupForm[password]', 'Teste321');
        $I->click('login-button');
    }
}
