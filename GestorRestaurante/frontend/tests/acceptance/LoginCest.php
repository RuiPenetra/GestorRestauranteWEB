<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class LoginCest
{
    public function Login(AcceptanceTester $I)
    {
        $I->wantTo('Login do utilizador');
        $I->amOnPage('/index.php?r=site%2Flogin');
        $I->fillField('LoginForm[username]', 'cliente');
        $I->fillField('LoginForm[password]', '1234567');
        $I->click('login-button');
        $I->wait(4);
        //$I->amOnPage('web/index.php?r=user%index');
        $I->see('Bem vindo');
        //$I->amLoggedInAs(2);
    }
}
