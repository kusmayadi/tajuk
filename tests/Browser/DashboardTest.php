<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\Login;
use App\Models\User;

class DashboardTest extends DuskTestCase
{
    /**
     * Auth middleware test.
     *
     * @return void
     */
    public function testAuth()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('dashboard'))
                    ->assertRouteIs('login');
        });
    }

    /**
     * Home page test
     */
    public function testDashboard()
    {
        $user = factory(User::class)->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(route('dashboard'))
                    ->on(new Login)
                    ->type('@email', $user->email)
                    ->type('@password', 'secret')
                    ->press('Login')
                    ->assertRouteIs('dashboard')
                    ->assertSee('Dashboard');
        });
    }
}
