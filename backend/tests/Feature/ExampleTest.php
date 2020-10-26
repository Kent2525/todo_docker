<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Title;
use App\Content;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

}
