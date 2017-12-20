<?php

use Illuminate\Database\Seeder;

class WorkingHourSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'employee_id' => 1, 'date' => '2017-12-20', 'start_time' => '08:00:00', 'finish_time' => '19:00:00',],

        ];

        foreach ($items as $item) {
            \App\WorkingHour::create($item);
        }
    }
}
