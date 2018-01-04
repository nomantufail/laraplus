<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiRoutingTest extends TestCase
{

    
    /**
     * 
     *
     * @return void
     */
    public function test_fee_strkucture_get()
    {
        $response = $this->get('api/fee_structure/get', []);
        $response->assertStatus(200);
    }

    //DummyTest
    

}
