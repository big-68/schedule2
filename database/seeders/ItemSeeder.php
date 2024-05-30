<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::factory()->count(17)->sequence(
            [
                'nameItem' => 'Литературное чтение'
            ],
            [
                'nameItem' => 'Окружающий мир'
            ],
            [
                'nameItem' => 'Музыка'
            ],
            [
                'nameItem' => 'ИЗО'
            ],
            [
                'nameItem' => 'Технология'
            ],
            [
                'nameItem' => 'Русский язык'
            ],
            [
                'nameItem' => 'Физическая культура'
            ],
            [
                'nameItem' => 'Математика'
            ],
            [
                'nameItem' => 'Английский язык'
            ],
            [
                'nameItem' => 'Литература'
            ],
            [
                'nameItem' => 'Информатика'
            ],
            [
                'nameItem' => 'История'
            ],
            [
                'nameItem' => 'Обществознание'
            ],
            [
                'nameItem' => 'География'
            ],
            [
                'nameItem' => 'Биология'
            ],
            [
                'nameItem' => 'Физика'
            ],
            [
                'nameItem' => 'Химия'
            ],

        )->create();
    }
}
