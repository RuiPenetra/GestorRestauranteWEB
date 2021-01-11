<?php
namespace backend\tests\acceptance;

use backend\tests\AcceptanceTester;
use yii\helpers\Url;

class LoginCest
{
    public function Login(AcceptanceTester $I)
    {
        $I->wantTo('Login do utilizador');
        $I->amOnPage('/');
        $I->fillField('LoginForm[username]', 'joana');
        $I->fillField('LoginForm[password]', 'joana1234567');
        $I->click('login-button');
        $I->wait(4);
        $I->see('Painel');
    }
}
