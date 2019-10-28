<?php


namespace Betweenapp\Backend\Tests\Browser;


use Betweenapp\Backend\Tests\BrowserTestCase;
use Laravel\Dusk\Browser;

class LoginTest extends BrowserTestCase
{

	public function testCanVisitLoginPage()
	{
		$this->browse(function (Browser $browser) {
			$browser->visit('/login')
				->waitForText('Email')
				->storeConsoleLog('login')
				->assertSee('Password');
		});
	}

}