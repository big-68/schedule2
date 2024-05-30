<?php

namespace Database\Seeders;

use App\Models\CallingSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CallingScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CallingSchedule::factory()->count(8)->sequence(
            [
                'label' => '1 Урок',
                'start_time' => fake()->time('8:00'),
                'end_time' => fake()->time('8:45'),
                'break_time' => fake()->time('00:10')
            ],
            [
                'label' => '2 Урок',
                'start_time' => fake()->time('8:55'),
                'end_time' => fake()->time('9:40'),
                'break_time' => fake()->time('00:10')
            ],
            [
                'label' => '3 Урок',
                'start_time' => fake()->time('9:50'),
                'end_time' => fake()->time('10:35'),
                'break_time' => fake()->time('00:10')
            ],
            [
                'label' => '4 Урок',
                'start_time' => fake()->time('10:45'),
                'end_time' => fake()->time('11:30'),
                'break_time' => fake()->time('00:20')
            ],
            [
                'label' => '5 Урок',
                'start_time' => fake()->time('11:50'),
                'end_time' => fake()->time('12:35'),
                'break_time' => fake()->time('00:10')
            ],
            [
                'label' => '6 Урок',
                'start_time' => fake()->time('12:45'),
                'end_time' => fake()->time('13:30'),
                'break_time' => fake()->time('00:10')
            ],
            [
                'label' => '7 Урок',
                'start_time' => fake()->time('13:40'),
                'end_time' => fake()->time('14:25'),
                'break_time' => fake()->time('00:10')
            ],
            [
                'label' => '8 Урок',
                'start_time' => fake()->time('14:35'),
                'end_time' => fake()->time('15:20'),
                'break_time' => fake()->time('00:10')
            ],
        )->create();

        // CallingSchedule::factory(1)->create();
    }
}
