<?php namespace backend\tests\acceptance;
use backend\tests\AcceptanceTester;

class StatuscodeCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo('Test Status code');
        $I->amOnPage('/');
        $I->seeResponseCodeIs(200);
    }
}
