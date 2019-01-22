<?php

namespace SafeStudio\Firebase\Tests;

use Dotenv\Dotenv;
use Orchestra\Testbench\TestCase;
use SafeStudio\Firebase\Firebase;

class FirebaseTest extends TestCase
{

    /**
     * @var Firebase
     */
    private $firebase;

    protected function getPackageProviders($app)
    {
        return ['SafeStudio\Firebase\FirebaseServiceProvider'];
    }


    /**
     * @throws \Exception
     */
    public function setUp()
    {
        parent::setUp();
        $this->firebase = new Firebase();
    }


    protected function getEnvironmentSetUp($app)
    {
        if (
            !env('FIREBASE_TYPE') ||
            !env('FIREBASE_PROJECT_ID') ||
            !env('FIREBASE_PRIVATE_KEY_ID') ||
            !env('FIREBASE_PRIVATE_KEY') ||
            !env('FIREBASE_CLIENT_EMAIL') ||
            !env('FIREBASE_CLIENT_ID') ||
            !env('FIREBASE_AUTH_URI') ||
            !env('FIREBASE_TOKEN_URI') ||
            !env('FIREBASE_AUTH_PROVIDER_X509_CERT_URL') ||
            !env('FIREBASE_CLIENT_X509_CERT_URL') ||
            !env('FIREBASE_DATABASEURL')
        ) {
            $env = new Dotenv(__DIR__);
            $env->load();
        }
        $app['config']->set('services.firebase.type', env('FIREBASE_TYPE'));
        $app['config']->set('services.firebase.project_id', env('FIREBASE_PROJECT_ID'));
        $app['config']->set('services.firebase.private_key_id', env('FIREBASE_PRIVATE_KEY_ID'));
        $app['config']->set('services.firebase.private_key', env('FIREBASE_PRIVATE_KEY'));
        $app['config']->set('services.firebase.client_email', env('FIREBASE_CLIENT_EMAIL'));
        $app['config']->set('services.firebase.client_id', env('FIREBASE_CLIENT_ID'));
        $app['config']->set('services.firebase.auth_uri', env('FIREBASE_AUTH_URI'));
        $app['config']->set('services.firebase.token_uri', env('FIREBASE_TOKEN_URI'));
        $app['config']->set('services.firebase.auth_provider_x509_cert_url', env('FIREBASE_AUTH_PROVIDER_X509_CERT_URL'));
        $app['config']->set('services.firebase.client_x509_cert_url', env('FIREBASE_CLIENT_X509_CERT_URL'));
        $app['config']->set('services.firebase.database_url', env('FIREBASE_DATABASEURL'));
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

