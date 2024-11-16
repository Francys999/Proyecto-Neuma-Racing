<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Option;


class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $options = [
            [
                "name" => "Diametro",
                "type" => 1,
                "features" => [
                    [
                        "value" => "15",
                        "description" => "Diametro - 15 pulgadas" 
                    ],

                    [
                        "value" => "16",
                        "description" => "Diametro - 16 pulgadas"
                    ],

                    [
                        "value" => "17",
                        "description" => "Diametro - 17 pulgadas" 
                    ],

                    [
                        "value" => "18",
                        "description" => "Diametro - 18 pulgadas" 
                    ],

                    [
                        "value" => "19",
                        "description" => "Diametro - 19 pulgadas" 
                    ],

                    [
                        "value" => "20",
                        "description" => "Diametro - 20 pulgadas" 
                    ],
                ]
            ],

            [
                "name" => "Material",
                "type" => 1,
                "features" => [
                    [
                        "value" => "Aluminio",
                        "description" => "Material de Aluminio"
                    ],

                    [
                        "value" => "Acero",
                        "description" => "Material de Acero"
                    ],

                    [
                        "value" => "Aleacion ligera",
                        "description" => "Material de Aleacion ligera"
                    ],
                ]
            ],

            [
                "name" => "Compatibilidad",
                "type" => 1,
                "features" => [
                    [
                        "value" => "Automoviles",
                        "description" => "Hecho para Automoviles"
                    ],

                    [
                        "value" => "SUV / Crossover",
                        "description" => "Hecho para SUV / Crossover"
                    ],

                    [
                        "value" => "Camionetas",
                        "description" => "Hecho para Camionetas"
                    ],

                    [
                        "value" => "Vans / Comerciales Ligeros",
                        "description" => "Hecho para Vans y Comerciales Ligeros"
                    ],
                ]
            ],

        ];

        foreach ($options as $option) {
            $optionModel = Option::create([
                "name" => $option["name"],
                "type" => $option["type"],
            ]);

            foreach ($option["features"] as $feature) {
                $optionModel->features()->create([
                    "value" => $feature["value"],
                    "description" => $feature["description"]
                ]);
            }
        }
    }
}
