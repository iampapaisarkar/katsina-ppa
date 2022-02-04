<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $State = [
            [
            'title' => 'Abia',
            ],
            [
            'title' => 'Adamawa',
            ],
            [
            'title' => 'Anambra',
            ],
            [
            'title' => 'Akwa Ibom',
            ],
            [
            'title' => 'Bauchi',
            ],
            [
            'title' => 'Bayelsa',
            ],
            [
            'title' => 'Benue',
            ],
            [
            'title' => 'Borno',
            ],
            [
            'title' => 'Cross River',
            ],
            [
            'title' => 'Delta',
            ],
            [
            'title' => 'Ebonyi',
            ],
            [
            'title' => 'Enugu',
            ],
            [
            'title' => 'Edo',
            ],
            [
            'title' => 'Ekiti',
            ],
            [
            'title' => 'Gombe',
            ],
            [
            'title' => 'Imo',
            ],
            [
            'title' => 'Jigawa',
            ],
            [
            'title' => 'Kaduna',
            ],
            [
            'title' => 'Kano',
            ],
            [
            'title' => 'Kaduna',
            ],
            [
            'title' => 'Katsina',
            ],
            [
            'title' => 'Kebbi',
            ],
            [
            'title' => 'Kogi',
            ],
            [
            'title' => 'Kwara',
            ],
            [
            'title' => 'Lagos',
            ],
            [
            'title' => 'Nasarawa',
            ],
            [
            'title' => 'Niger',
            ],
            [
            'title' => 'Ogun',
            ],
            [
            'title' => 'Ondo',
            ],
            [
            'title' => 'Osun',
            ],
            [
            'title' => 'Oyo',
            ],
            [
            'title' => 'Plateau',
            ],
            [
            'title' => 'Rivers',
            ],
            [
            'title' => 'Sokoto',
            ],
            [
            'title' => 'Taraba',
            ],
            [
            'title' => 'Yobe',
            ],
            [
            'title' => 'Zamfara',
            ],
            [
            'title' => 'FCT Abuja',
            ]
        ];
        State::insert($State);
    }
}
