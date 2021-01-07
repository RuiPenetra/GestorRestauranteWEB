<?php
namespace frontend\tests\acceptance;

use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class HomeCest
{
    public function checkHome(AcceptanceTester $I)
    {
        $I->amOnPage('/index.php?r=site%2Fmenu');
        $I->wait(2);
        $I->see('Ementa');

        $I->see('Lista Ementas');
        //$I->click('About');
        //$I->click('#registar');
        //$I->see('Registar');
        $I->click('#nav-registar');

        //$I->click('About', '.nav-link');
        $I->wait(2); // wait for page to be opened

        $I->see('Dados Pessoais');
    }
}
