<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ArticleTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();

        Session::start();
    }

    public function testCreateNotAccessibleIfNotLoggedInPage()
    {
        $response = $this->get('/article/create');
        $response->assertStatus(302);

        $response->assertSee('/login');
    }

    public function testCreatePageAccessibleIfLoggedIn()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)->get('/article/create');
        $response->assertStatus(200);

        $response->assertSee('Create an article');
        $response->assertSee('Reach your audience');
    }
}
