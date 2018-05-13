<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageTest extends TestCase
{
    public function testWelcomePage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response->assertSee('Clean Blog');
        $response->assertSee('A Blog Theme by Start Bootstrap');
    }

    public function testAboutPage()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);

        $response->assertSee('About Me');
        $response->assertSee('This is what I do.');
    }

    public function testContactPage()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);

        $response->assertSee('Contact Me');
        $response->assertSee('Have questions? I have answers.');
    }

    public function testPostPage()
    {
        $response = $this->get('/post');
        $response->assertStatus(200);

        $response->assertSee('Man must explore, and this is exploration at its greatest');
        $response->assertSee('Problems look mighty small from 150 miles up');
    }

    public function testLoginPage()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);

        $response->assertSee('Login');
        $response->assertSee('Access your profile.');
    }

    public function testRegisterPage()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);

        $response->assertSee('Register');
        $response->assertSee('Create your profile.');
    }
}
