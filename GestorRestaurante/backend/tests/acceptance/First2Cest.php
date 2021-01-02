<?php namespace backend\tests\acceptance;
use backend\tests\AcceptanceTester;

class First2Cest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
        $I->wantTo('Test the response code');
        $I->amOnPage('/');
    }
}
