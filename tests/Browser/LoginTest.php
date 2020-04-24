<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Login page test.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Login')
                    ->assertVisible('input[name="email"]')
                    ->assertVisible('input[name="password"]')
                    ->assertVisible('input[name="remember"]')
                    ->assertSee('Remember Me')
                    ->assertSee('Forgot Your Password?');
        });
    }

    /**
     * Login with blank input test
     */
    public function testBlankInput()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->type('email', '')
                ->type('password', '')
                ->press('Login')
                ->assertSee('The email field is required.')
                ->assertSee('The password field is required.');
        });
    }

    /**
     * Login with wrong credentials
     */
    public function testWrongCredentials()
    {
        $user = factory(User::class)->make();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/')
                ->type('email', $user->email)
                ->type('password', $user->password)
                ->press('Login')
                ->assertSee('These credentials do not match our records.');
        });
    }

    /**
     * Login success test
     */
    public function testSuccess()
    {
        $password = 'secret';

        $user = factory(User::class)->create(['password' => Hash::make($password)]);

        $this->browse(function (Browser $browser) use ($user, $password) {
            $browser->visit('/')
                ->type('email', $user->email)
                ->type('password', $password)
                ->press('Login')
                ->assertRouteIs('dashboard');
        });
    }
}
