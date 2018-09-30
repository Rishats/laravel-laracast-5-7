<?php

use App\User;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('make:user', function () {
    $user = User::forceCreate([
        'name' => $this->ask('What name should we use?'),
        'email' => $this->ask('And which email should we use?'),
        'password' => bcrypt($this->secret('And the password?')),
    ]);

    $this->info("The {$user->name} user has been created.");
})->describe('Persist a new user to the db.');
