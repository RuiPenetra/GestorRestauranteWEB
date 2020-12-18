<?php namespace frontend\tests\acceptance;
use backend\tests\AcceptanceTester;

class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo('Test the response code');
        $I->amOnPage('/');
        $I->seeResponseCodeis('200');
    }
}
