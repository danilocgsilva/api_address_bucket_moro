<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApplicationPathsTest extends TestCase
{
    public function testHomeWelcome(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testOkCreateApi(): void
    {
        $response = $this->get('api/create');

        $response->assertStatus(200);
    }

    public function testOkListApi(): void
    {
        $response = $this->get('api');

        $response->assertStatus(200);
    }
}
