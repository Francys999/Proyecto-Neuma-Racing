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
            // Opciones generales de marcas
            [
                "name" => "Marca",
                "type" => 1,
                "features" => [
                    ["value" => "Michelin", "description" => "Michelin"],
                    ["value" => "Bridgestone", "description" => "Bridgestone"],
                    ["value" => "Goodyear", "description" => "Goodyear"],
                    ["value" => "Pirelli", "description" => "Pirelli"],
                    ["value" => "Continental", "description" => "Continental"],
                    ["value" => "Hankook", "description" => "Hankook"],
                    ["value" => "Yokohama", "description" => "Yokohama"],
                    ["value" => "BFGoodrich", "description" => "BFGoodrich"],
                    ["value" => "Kumho", "description" => "Kumho"],
                    ["value" => "Falken", "description" => "Falken"],
                    ["value" => "Enkei", "description" => "Enkei"],
                    ["value" => "BBS", "description" => "BBS"],
                    ["value" => "OZ Racing", "description" => "OZ Racing"],
                    ["value" => "Motegi Racing", "description" => "Motegi Racing"],
                    ["value" => "Fuel Off-Road", "description" => "Fuel Off-Road"],
                    ["value" => "Rotiform", "description" => "Rotiform"],
                    ["value" => "XXR", "description" => "XXR"],
                    ["value" => "HRE", "description" => "HRE"],
                    ["value" => "American Racing", "description" => "American Racing"],
                    ["value" => "Volk Racing", "description" => "Volk Racing"],
                    ["value" => "Optima", "description" => "Optima"],
                    ["value" => "Bosch", "description" => "Bosch"],
                    ["value" => "Exide", "description" => "Exide"],
                    ["value" => "Varta", "description" => "Varta"],
                    ["value" => "LTH", "description" => "LTH"],
                    ["value" => "Trojan", "description" => "Trojan"],
                    ["value" => "Duralast", "description" => "Duralast"],
                    ["value" => "Interstate", "description" => "Interstate"],
                    ["value" => "Yuasa", "description" => "Yuasa"],
                    ["value" => "Odyssey", "description" => "Odyssey"],
                ]
            ],
            // Opciones de ancho
            [
                "name" => "Ancho",
                "type" => 1,
                "features" => [
                    ["value" => "195 mm", "description" => "195 mm"],
                    ["value" => "205 mm", "description" => "205 mm"],
                    ["value" => "215 mm", "description" => "215 mm"],
                    ["value" => "225 mm", "description" => "225 mm"],
                    ["value" => "235 mm", "description" => "235 mm"],
                    ["value" => "245 mm", "description" => "245 mm"],
                    ["value" => "255 mm", "description" => "255 mm"],
                    ["value" => "265 mm", "description" => "265 mm"],
                    ["value" => "275 mm", "description" => "275 mm"],
                    ["value" => "285 mm", "description" => "285 mm"],
                ]
            ],
            // Opciones de perfil
            [
                "name" => "Perfil",
                "type" => 1,
                "features" => [
                    ["value" => "30", "description" => "Perfil 30"],
                    ["value" => "35", "description" => "Perfil 35"],
                    ["value" => "40", "description" => "Perfil 40"],
                    ["value" => "45", "description" => "Perfil 45"],
                    ["value" => "50", "description" => "Perfil 50"],
                    ["value" => "55", "description" => "Perfil 55"],
                    ["value" => "60", "description" => "Perfil 60"],
                    ["value" => "65", "description" => "Perfil 65"],
                    ["value" => "70", "description" => "Perfil 70"],
                    ["value" => "75", "description" => "Perfil 75"],
                ]
            ],
            // Opciones de aro
            [
                "name" => "Aro",
                "type" => 1,
                "features" => [
                    ["value" => "14\"", "description" => "14 pulgadas"],
                    ["value" => "15\"", "description" => "15 pulgadas"],
                    ["value" => "16\"", "description" => "16 pulgadas"],
                    ["value" => "17\"", "description" => "17 pulgadas"],
                    ["value" => "18\"", "description" => "18 pulgadas"],
                    ["value" => "19\"", "description" => "19 pulgadas"],
                    ["value" => "20\"", "description" => "20 pulgadas"],
                    ["value" => "21\"", "description" => "21 pulgadas"],
                    ["value" => "22\"", "description" => "22 pulgadas"],
                ]
            ],
            // Opciones de material
            [
                "name" => "Material",
                "type" => 1,
                "features" => [
                    ["value" => "Acero", "description" => "Material Acero"],
                    ["value" => "Aluminio", "description" => "Material Aluminio"],
                    ["value" => "Aleación de magnesio", "description" => "Material Aleación de Magnesio"],
                    ["value" => "Fibra de carbono", "description" => "Material Fibra de Carbono"],
                    ["value" => "Titanio", "description" => "Material Titanio"],
                    ["value" => "Plomo-Ácido", "description" => "Plomo-Ácido"],
                    ["value" => "AGM", "description" => "Absorbed Glass Mat"],
                    ["value" => "Gel", "description" => "Material Gel"],
                    ["value" => "Litio-Ion", "description" => "Litio-Ion"],
                    ["value" => "Níquel-Hidruro Metálico", "description" => "NiMH"],
                    ["value" => "Polímero de Litio", "description" => "LiPo"],
                ]
            ],
            // Opciones de voltaje
            [
                "name" => "Voltaje",
                "type" => 1,
                "features" => [
                    ["value" => "6V", "description" => "6 Voltios"],
                    ["value" => "12V", "description" => "12 Voltios"],
                    ["value" => "24V", "description" => "24 Voltios"],
                ]
            ],
            // Opciones de amperaje
            [
                "name" => "Amperaje",
                "type" => 1,
                "features" => [
                    ["value" => "35 Ah", "description" => "35 Amperios-Hora"],
                    ["value" => "45 Ah", "description" => "45 Amperios-Hora"],
                    ["value" => "55 Ah", "description" => "55 Amperios-Hora"],
                    ["value" => "60 Ah", "description" => "60 Amperios-Hora"],
                    ["value" => "70 Ah", "description" => "70 Amperios-Hora"],
                    ["value" => "80 Ah", "description" => "80 Amperios-Hora"],
                    ["value" => "100 Ah", "description" => "100 Amperios-Hora"],
                    ["value" => "120 Ah", "description" => "120 Amperios-Hora"],
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
