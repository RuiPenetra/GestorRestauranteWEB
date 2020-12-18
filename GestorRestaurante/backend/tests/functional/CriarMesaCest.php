<?php namespace backend\tests\functional;
use backend\tests\FunctionalTester;

class CriarMesaCest
{
    public function _before(FunctionalTester $I)
    {
        $I->amOnPage('backend/web/index.php?r=mesa%2Findex');
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
        $I->wantTo('Create a table');
        $I->fillField('Mesa[id]','50');
        $I->fillField('Mesa[n_lugares]','5');
        $I->click('criar');
    }
}
