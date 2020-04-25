<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Tests\Browser\Pages\Login;
use App\Models\User;

class NavigationTest extends DuskTestCase
{
    /**
     * Navigation header test.
     *
     * @return void
     */
    public function testHeader()
    {
        $user = factory(User::class)->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(new Login)
                    ->loginUser($user)
                    ->with('#profile', function ($profile) use ($user) {
                        $profile->assertSeeIn('@user', $user->name)
                                ->assertDontSee('Logout')
                                ->assertPresent('@profile_menu')
                                ->mouseover('@user')
                                ->assertSee('Logout')
                                ->click('@logout');
                    })
                    ->assertRouteIs('login');
        });
    }

    /**
     * Main navigation test
     */
    public function testMain()
    {
        $user = factory(User::class)->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(new Login)
                    ->loginUser($user)
                    ->with('#navigation', function ($navigation) {
                        $navigation->assertSee('Dashboard')
                                   ->click('@nav-dashboard')
                                   ->assertRouteIs('dashboard');
                    });
        });
    }
}
