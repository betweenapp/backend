<?php


namespace Betweenapp\Backend\Tests;


use Betweenapp\Backend\Facades\BackendComponent;
use Orchestra\Testbench\TestCase;
use Betweenapp\Backend\BackendServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeatureTestCase extends TestCase
{

    use RefreshDatabase;

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
        BackendComponent::flushComponentsRegistration();
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

    protected function resolveApplicationCore($app)
    {
        parent::resolveApplicationCore($app);

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

        $config->set('logging.default', 'errorlog');

        $config->set('database.default', 'testing');

        $config->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

    }

    /** @test
    public function it_runs_the_migrations()
    {
    $now = Carbon::now();
    \DB::table('insurances')->insert([
    'name' => 'Test Insurance',
    'version' => 'Hello',
    'context_id' => 18,
    'company_id' => 1,
    'created_at' => $now,
    'updated_at' => $now,
    ]);
    $insurances = \DB::table('insurances')->where('id', '=', 1)->first();
    $this->assertEquals('Test Insurance', $insurances->name);
    } */

}
