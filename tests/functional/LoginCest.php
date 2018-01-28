<?php


class LoginCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function tryRegister(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->click('Register');
        $I->fillField('name', 'Kenneth');
        $I->fillField('email', 'kenneth.sok@gmail.com');
        $I->fillField('password', 'qwe321');
        $I->fillField('password_confirmation', 'qwe321');
        $I->click('Register', 'form');
        $I->see('You are logged in!');
    }

    public function tryLogin (FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->click('Login');
        $I->fillField('email', 'kenneth.sok@gmail.com');
        $I->fillField('password', 'qwe321');
        $I->click('Login', 'form');
        $I->see('You are logged in!');
        // $I->seeEmailIsSent(); // only for Symfony2
    }
}
