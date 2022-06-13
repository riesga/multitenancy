<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Laravel\Passport\Client;
use Laravel\Passport\PersonalAccessClient;
use Laravel\Passport\ClientRepository;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        /*
        $client = Client::create([
            'name' => config('app.name') . ' Password Grant Client',
            'secret' => config('passport.personal_access_client.secret'),
            'redirect' =>  config('app.url'),
            'personal_access_client' => '1',
            'password_client' => '0',
            'revoked' => '0',
        ]);

        PersonalAccessClient::create([
            'client_id' => $client->id,
        ]);
        */

        $client = new ClientRepository();

         $client->createPasswordGrantClient(null, config('app.name') . ' ' . 'Default password grant client', config('app.url'),);
         $client->createPersonalAccessClient(null, config('app.name') . ' ' . 'Default personal access client', config('app.url'),);
    }
}
