<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductorTest extends TestCase
{
    use RefreshDatabase; // utiliza una base de datos en blanco
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_can_be_shown()
    {
        $response = $this->get('/productores');
        $response->assertStatus(200);
    }
}
