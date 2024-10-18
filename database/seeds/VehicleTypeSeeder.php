<?php

use Illuminate\Database\Seeder;
use App\VehicleType;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car = VehicleType::updateOrCreate(
            [
                'name' => 'Car',
            ],
            [
                'name' => 'Car',
                'description' => 'Car description',
                
            ]
        );

        $motorcycle = VehicleType::updateOrCreate(
            [
                'name' => 'Motorcycle',
            ],
            [
                'name' => 'Motorcycle',
                'description' => 'Motorcycle description',
                
            ]
        );
    }
}
