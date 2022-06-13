<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Laravel\Passport\Client;
use Laravel\Passport\PersonalAccessClient;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        logger('fafasd');
        logger(config('passport.personal_access_client.secret'));
        $client = Client::create([
            'name' => config('app.name') . ' Password Grant Client',
            'secret' => 'sGcBPXGLEJh1jIWxNofuIQiln0Q5EgnuQNtrQzCW',
            'redirect' =>  config('app.url'),
            'personal_access_client' => '1',
            'password_client' => '0',
            'revoked' => '0',
        ]);

        PersonalAccessClient::create([
            'client_id' => $client->id,
        ]);
    }
}
