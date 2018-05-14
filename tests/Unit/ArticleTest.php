<?php

namespace Tests\Unit;

use App\Article;
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

    public function testArticlePage()
    {
        $article = Article::find(1);

        $response = $this->get('/article/1');
        $response->assertStatus(200);

        $response->assertSee($article->title);
        $response->assertSee($article->body);
        $response->assertSee($article->image_name);
    }

    public function testEditNotAccessibleIfNotLoggedInPage()
    {
        $response = $this->get('/article/1/edit');
        $response->assertStatus(302);

        $response->assertSee('/login');
    }

    public function testEditPageAccessibleIfAuthor()
    {
        $user = User::find(1);

        $response = $this->actingAs($user)->get('/article/1/edit');
        $response->assertStatus(200);

        $response->assertSee('Edit article');
        $response->assertSee('Edit your story');
    }

    public function testCannotEditPageAccessibleIfNotAuthor()
    {
        $user = User::find(2);

        $response = $this->actingAs($user)->get('/article/1/edit');
        $response->assertStatus(403);
    }

    public function testUpdateFunctionIfAuthor()
    {
        $user = User::find(1);

        Storage::fake('public');

        $this->assertDatabaseMissing('articles', [
            'title'             => "This is my new title",
            'body'              => "This is my new body",
            'image_name'        => "image2.jpg",
        ]);

        $response = $this->actingAs($user)->put('/article/1', array(
            '_token'            => csrf_token(),
            'title'             => "This is my new title",
            'body'              => "This is my new body",
            'image'             => UploadedFile::fake()->image('image2.jpg'),
        ));

        // Assert the file was stored
        Storage::disk('public')->assertExists('/articles/image2.jpg');

        // Assert the entity article was stored
        $this->assertDatabaseHas('articles', [
            'title'             => "This is my new title",
            'body'              => "This is my new body",
            'image_name'        => "image2.jpg",
        ]);
    }

    public function testCannotUpdateFunctionIfNotAuthor()
    {
        $user = User::find(2);

        $response = $this->actingAs($user)->put('/article/1', array(
            '_token'            => csrf_token(),
            'title'             => "This is my new title",
            'body'              => "This is my new body",
            'image'             => UploadedFile::fake()->image('image2.jpg'),
        ));

        $response->assertStatus(403);
    }
}
