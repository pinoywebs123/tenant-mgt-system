<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
	use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_visit_login_page()
    {
        $this->get('/login')
   			->assertStatus(200)
   			->assertSee('Login Form');
    }
}
