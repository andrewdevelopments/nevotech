<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {

        $response = $this->get('/');
        $response->assertStatus(200);

        $restaurants = $this->get(route('restaurant.index'));
        $restaurants->assertStatus(200);

        #2
        $this->artisan('migrate');

        #3
        $this->call('GET', '/restaurant');
        $this->assertEquals(200, $response->status());

    }
}
