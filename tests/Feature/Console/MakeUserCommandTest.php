<?php

namespace Tests\Feature\Console;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MakeUserCommandTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_generates_a_new_user()
    {
        $this->artisan('make:user')
            ->expectsQuestion('What name should we use?', 'JohnDoe')
            ->expectsQuestion('And which email should we use?', 'john@example.com')
            ->expectsQuestion('And the password?', 'password')
            ->expectsOutput('The JohnDoe user has been created.');

        $this->assertDatabaseHas('users', ['name' => 'JohnDoe']);
    }
}
