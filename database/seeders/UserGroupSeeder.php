<?php

namespace Database\Seeders;

use App\Models\UserGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserGroup::factory()->count(3)->sequence(
            [
                'label' => 'Администратор'
            ],
            [
                'label' => 'Ученик'
            ],
            [
                'label' => 'Учитель'
            ]
        )->create();
    }
}
