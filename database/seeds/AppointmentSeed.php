<?php

use Illuminate\Database\Seeder;

class AppointmentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'client_id' => 1, 'employee_id' => 1, 'start_time' => '2017-12-21 09:00:00', 'finish_time' => '2017-12-21 13:00:00', 'comments' => 'En un magnifico proyecto',],

        ];

        foreach ($items as $item) {
            \App\Appointment::create($item);
        }
    }
}
