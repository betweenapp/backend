<?php


namespace Betweenapp\Backend\Tests\Http\Login;


use Betweenapp\Backend\Tests\FeatureTestCase;

class LoginApiControllerTest extends FeatureTestCase
{

    public function test_it_can_get_a_form_configuration()
    {
        $response = $this->get('/api/betweenapp/backend/login/form-config');

        $response->assertStatus(200);
    }

}
