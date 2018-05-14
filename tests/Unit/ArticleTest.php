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

    public function testStoreFunction()
    {
        $user = User::find(1);

        Storage::fake('public');

        $response = $this->actingAs($user)->post('/article', array(
            '_token'            => csrf_token(),
            'title'             => "This is my title",
            'body'              => "This is my body",
            'image'             => UploadedFile::fake()->image('image.jpg'),
        ));

        // Assert the file was stored
        Storage::disk('public')->assertExists('/articles/image.jpg');

        // Assert the entity article was stored
        $this->assertDatabaseHas('articles', [
            'title'             => "This is my title",
            'body'              => "This is my body",
            'image_name'        => "image.jpg",
        ]);
    }

    public function testArticlesPage()
    {
        $response = $this->get('/articles');
        $response->assertStatus(200);

        $response->assertSee('Articles');
        $response->assertSee('Read our articles');
    }
}
