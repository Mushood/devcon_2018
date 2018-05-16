<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Clean Blog');
        });
    }

    public function testLogin()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                ->type('email', 'admin@test.com')
                ->type('password', 'secret')
                ->press('@login-button')
                ->assertPathIs('/home');
        });
    }
}
