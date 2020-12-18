<?php

namespace frontend\tests\functional;

use frontend\tests\FunctionalTester;

class SignupCest
{
    protected $formId = '#form-signup';


    public function _before(FunctionalTester $I)
    {
        $I->amOnRoute('site/signup');
    }

    public function tryToTest(FunctionalTester $I)
    {
        $I->amOnPage('web/index.php?r=site%2Fsignup');
        $I->fillField('SignupForm[nome]', 'Rui');
        $I->fillField('SignupForm[apelido]', 'Penetra');
        $I->fillField('SignupForm[morada]', 'Rua do Tascao');
        $I->fillField('SignupForm[codigopostal]', '2569-499');
        $I->fillField('SignupForm[datanascimento]', '08/12/2020');
        $I->fillField('SignupForm[nacionalidade]', 'Portuguesa');
        $I->fillField('SignupForm[telemovel]', '919999998');
        $I->selectOption('SignupForm[genero]', 'Masculino');
        $I->fillField('SignupForm[username]','Popito');
        $I->fillField('SignupForm[email]','Popito@gmail.com');
        $I->fillField('SignupForm[password]','Teste321');
        $I->click('login-button');
        $I->amOnPage('web/index.php?r=site%2Fsignup');
    }

    public function signupWithEmptyFields(FunctionalTester $I)
    {
        $I->see('Signup', 'h1');
        $I->see('Please fill out the following fields to signup:');
        $I->submitForm($this->formId, []);
        $I->seeValidationError('Username cannot be blank.');
        $I->seeValidationError('Email cannot be blank.');
        $I->seeValidationError('Password cannot be blank.');

    }

    public function signupWithWrongEmail(FunctionalTester $I)
    {
        $I->submitForm(
            $this->formId, [
            'SignupForm[username]'  => 'tester',
            'SignupForm[email]'     => 'ttttt',
            'SignupForm[password]'  => 'tester_password',
        ]
        );
        $I->dontSee('Username cannot be blank.', '.help-block');
        $I->dontSee('Password cannot be blank.', '.help-block');
        $I->see('Email is not a valid email address.', '.help-block');
    }

    public function signupSuccessfully(FunctionalTester $I)
    {
        $I->submitForm($this->formId, [
            'SignupForm[username]' => 'tester',
            'SignupForm[email]' => 'tester.email@example.com',
            'SignupForm[password]' => 'tester_password',
        ]);

        $I->seeRecord('common\models\User', [
            'username' => 'tester',
            'email' => 'tester.email@example.com',
            'status' => \common\models\User::STATUS_INACTIVE
        ]);

        $I->seeEmailIsSent();
        $I->see('Thank you for registration. Please check your inbox for verification email.');
    }
}
