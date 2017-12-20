<?php

use Illuminate\Database\Seeder;

class ClientSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'first_name' => 'Jose Maria', 'last_name' => 'Vasquez Minchola', 'phone' => '214585469', 'email' => 'jose@hotmail.com',],

        ];

        foreach ($items as $item) {
            \App\Client::create($item);
        }
    }
}
