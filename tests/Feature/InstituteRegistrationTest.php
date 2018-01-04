<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InstituteRegistrationTest extends TestCase
{
    /**
     * A basic test which test the institute registration.
     *
     * @return void
     */
    public function testInstituteRegistration()
    {
        $response = $this->get('/register');
        
        $response->assertStatus(200);
    }
}
