<?php

use Illuminate\Database\Seeder;

class EmployeeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'first_name' => 'Susan Vilma', 'last_name' => 'jaque Salgado', 'phone' => '147852236', 'email' => 'susan@hotmal.com',],

        ];

        foreach ($items as $item) {
            \App\Employee::create($item);
        }
    }
}
