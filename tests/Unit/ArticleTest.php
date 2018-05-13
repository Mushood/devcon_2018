<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleTest extends TestCase
{
    public function testCreatePage()
    {
        $response = $this->get('/article/create');
        $response->assertStatus(200);

        $response->assertSee('Create an article');
        $response->assertSee('Reach your audience');
    }
}
