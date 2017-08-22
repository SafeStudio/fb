<?php

namespace SafeStudio\Firebase\Tests;

use Dotenv\Dotenv;
use Firebase\FirebaseInterface;
use Orchestra\Testbench\TestCase;
use SafeStudio\Firebase\Firebase;

class FirebaseTest extends TestCase
{

    /**
     * @var FirebaseInterface
     */
    private $firebase;

    protected function getPackageProviders($app)
    {
        return ['SafeStudio\Firebase\FirebaseServiceProvider'];
    }


    public function setUp()
    {
        parent::setUp();
        $this->firebase = new Firebase();
    }


    protected function getEnvironmentSetUp($app)
    {
        if (!env('FB_DATABASE') || !env('FB_DATABASE_KEY')) {
            $env = new Dotenv(__DIR__);
            $env->load();
        }
        $app['config']->set('services.firebase.database_url', env('FB_DATABASE'));
        $app['config']->set('services.firebase.secret', env('FB_DATABASE_KEY'));
    }

    public function testSetFunction()
    {
        $res = $this->firebase->set('testing', ['key' => 'Test Data']);
        $this->assertStringMatchesFormat($res, '{"key":"Test Data"}');
    }

    public function testGetFunction()
    {
        $res = $this->firebase->get('testing');
        $this->assertStringMatchesFormat($res, '{"key":"Test Data"}');
    }

    public function testUpdate()
    {
        $res = $this->firebase->update('testing', ['key' => 'Test Data1']);
        $this->assertStringMatchesFormat($res, '{"key":"Test Data1"}');
        $res1 = $this->firebase->update('testing', ['key' => 'Test Data']);
        $this->assertStringMatchesFormat($res1, '{"key":"Test Data"}');
    }

    public function testDeleteFunction()
    {
        $res = $this->firebase->delete('testing');
        $this->assertStringMatchesFormat($res, 'null');
    }

}

