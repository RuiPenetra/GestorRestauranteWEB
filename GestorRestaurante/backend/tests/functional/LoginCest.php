<?php

namespace backend\tests\functional;

use backend\tests\FunctionalTester;
use common\fixtures\PerfilFixture;
use common\fixtures\UserFixture;

/**
 * Class LoginCest
 */
class LoginCest
{
    /**
     * Load fixtures before db transaction begin
     * Called in _before()
     * @see \Codeception\Module\Yii2::_before()
     * @see \Codeception\Module\Yii2::loadFixtures()
     * @return array
     */
    public function _fixtures()
    {
/*        return [

            'profiles' => [
                'class' => UserFixture::className(),
                // fixture data located in tests/_data/user.php
                'dataFile' => codecept_data_dir() . 'login_data.php'
            ],
        ];*/
    }
    /**
     * @param FunctionalTester $I
     */
    public function loginUser(FunctionalTester $I)
    {
        $I->wantTo('Login do utilizador');
        $I->amOnPage('/');
        $I->fillField('LoginForm[username]', 'joana');
        $I->fillField('LoginForm[password]', 'joana1234567');
        $I->click('login-button');
        //$I->amOnPage('web/index.php?r=user%index');
        $I->see('Painel');
        //$I->amLoggedInAs(2);
    }
}
