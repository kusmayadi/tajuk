<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\Login;
use App\Models\User;

class HomeTest extends DuskTestCase
{
    /**
     * Auth middleware test.
     *
     * @return void
     */
    public function testAuth()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('home'))
                    ->assertRouteIs('login');
        });
    }

    /**
     * Home page test
     */
    public function testHome()
    {
        $user = factory(User::class)->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(route('home'))
                    ->on(new Login)
                    ->type('@email', $user->email)
                    ->type('@password', 'secret')
                    ->press('Login')
                    ->assertRouteIs('home')
                    ->assertSee('Dashboard');
        });
    }
}
