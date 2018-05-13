<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicTest extends TestCase
{
    public function testWelcomePage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response->assertSee('Laravel');
    }
}
