<?php


namespace Betweenapp\Backend\Tests;

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Illuminate\Support\Facades\File;
use Orchestra\Testbench\Dusk\TestCase;
use Betweenapp\Backend\BackendServiceProvider;

abstract class BrowserTestCase extends TestCase
{

	protected static $baseServeHost = '127.0.0.1';
	protected static $baseServePort = 9000;


	public function __construct($name = null, array $data = [], $dataName = '')
	{
		parent::__construct($name, $data, $dataName);

	}


	/**
	 * Get package providers.  At a minimum this is the package being tested, but also
	 * would include packages upon which our package depends, e.g. Cartalyst/Sentry
	 * In a normal app environment these would be added to the 'providers' array in
	 * the config/app.php file.
	 *
	 * @param  \Illuminate\Foundation\Application  $app
	 *
	 * @return array
	 */
	protected function getPackageProviders($app)
	{
		return [
			BackendServiceProvider::class
		];
	}


	/**
	 * Define environment setup.
	 *
	 * @param  \Illuminate\Foundation\Application  $app
	 *
	 * @return void
	 */
	protected function getEnvironmentSetUp($app)
	{
		$config = $app->get('config');

		$app->bind('path.public', function() {
			return __DIR__ . '/../public';
		});

		File::copyDirectory(
			__DIR__ .'/../public',
			__DIR__ .'/../vendor/orchestra/testbench-dusk/laravel/public'
		);




	}


}