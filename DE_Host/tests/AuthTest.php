<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use DEVAPP\User;

class AuthTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    use DatabaseTransactions;
    public function test_the_email_verification()
    {
        $this->visit('test')
            ->type('John Tiger', 'name')
            ->type('1624816919@qq.com','email')
            ->type('password', 'password')
            ->type('John','firstname')
            ->type('Tiger','lastname')
            ->type('15110010987','phonenumber')
            ->type('C:\\fakepath\123.img','imagefilepath')
            ->press('Register');
        $this->see('Please confirm your email')
            ->seeInDatabase('users', ['name' => 'John Tiger', 'verified' => 0]);

        $user = User::whereName('John Tiger')->first();
//        $this->login($user)->see('could not sign you in');
        $this->visit("/register/confirm/{$user->email_token}")
            ->see('You are now confirmed. Please login')
            ->seeInDatabase('users', ['name' => 'John Tiger', 'verified' => 1]);
    }

    /** @test **/
    function a_user_may_login()
    {
         // $this->login()->see('you are now signed in');
         $this->login()->see('could not sign you in');
    }

    protected function login($user = null)
    {
        // TODO: Something goes on here regarding the factory model in Laravel
        // ..
        $user = $user ?: factory(DEVAPP\User::class)->make([
            'password' => 'password'
        ]);

        return $this->visit('test/login')
                    ->type($user->email, 'email')
                    ->type('password', 'password')
                    ->Press('sign in');
    }
}
