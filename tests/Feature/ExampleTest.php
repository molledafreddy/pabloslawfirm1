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
    }

    public function testBasicExample()
    {
        $user = factory(User::class)->create([
             'name' => 'Juan Palencia',
        ]);

        $this->actingAs($user, 'api');
        
        $this->get('/api/user')
             ->assertSee('Juan Palencia');
    }
}
