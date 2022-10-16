<?php

namespace Cms\Modules\Auth\Tests\Feature\Controllers;

use Cms\Modules\Auth\Tests\AuthTestCase;
use Cms\Modules\Core\Models\User;
use Faker;

class RegisterControllerTest extends AuthTestCase
{
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function test_register()
    {
        $faker =  Faker\Factory::create();
        $email = $faker->unique()->email;
        $password = $faker->password;

        $credentials = [
            'name' => $faker->name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
        ];

        $this->call('POST', '/register', $credentials);

        $user = User::where('email', $email)->first();

        $this->assertNotNull($user);
    }
}
