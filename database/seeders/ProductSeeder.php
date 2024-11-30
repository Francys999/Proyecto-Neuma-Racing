<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Aros (10 productos)
            [
                'sku' => 1001,
                'name' => 'Aros American Racing Torq Thrust',
                'description' => 'Clásicos para autos vintage.',
                'image_path' => 'products/Aros American Racing Torq Thrust.jpg',
                'price' => 350.0,
                'category_id' => 1,
            ],
            [
                'sku' => 1002,
                'name' => 'Aros BBS SR',
                'description' => 'Calidad alemana con diseño elegante.',
                'image_path' => 'products/Aros BBS SR.png',
                'price' => 550.0,
                'category_id' => 1,
            ],
            [
                'sku' => 1003,
                'name' => 'Aros Enkei RPF1',
                'description' => 'Diseño ligero para alto rendimiento.',
                'image_path' => 'products/Aros Enkei RPF1.jpg',
                'price' => 500.0,
                'category_id' => 1,
            ],
            [
                'sku' => 1004,
                'name' => 'Aros Fuel Off-Road D680',
                'description' => 'Resistencia y estilo para camionetas.',
                'image_path' => 'products/Aros Fuel Off-Road D680.png',
                'price' => 500.0,
                'category_id' => 1,
            ],
            [
                'sku' => 1005,
                'name' => 'Aros HRE Performance Wheels',
                'description' => 'Exclusividad y máximo rendimiento.',
                'image_path' => 'products/Aros HRE Performance Wheels.jpg',
                'price' => 900.0,
                'category_id' => 1,
            ],
            [
                'sku' => 1006,
                'name' => 'Aros Motegi Racing MR131',
                'description' => 'Estilo agresivo para autos personalizados.',
                'image_path' => 'products/Aros Motegi Racing MR131.jpg',
                'price' => 450.0,
                'category_id' => 1,
            ],
            [
                'sku' => 1007,
                'name' => 'Aros OZ Racing Ultraleggera',
                'description' => 'Ligereza extrema para autos deportivos.',
                'image_path' => 'products/Aros OZ Racing Ultraleggera.jpg',
                'price' => 600.0,
                'category_id' => 1,
            ],
            [
                'sku' => 1008,
                'name' => 'Aros Rotiform LAS-R',
                'description' => 'Diseño moderno para autos de lujo.',
                'image_path' => 'products/Aros Rotiform LAS-R.jpg',
                'price' => 520.0,
                'category_id' => 1,
            ],
            [
                'sku' => 1009,
                'name' => 'Aros Volk Racing TE37',
                'description' => 'Icono de alto rendimiento japonés.',
                'image_path' => 'products/Aros Volk Racing TE37.jpg',
                'price' => 650.0,
                'category_id' => 1,
            ],
            [
                'sku' => 1010,
                'name' => 'Aros XXR 527',
                'description' => 'Favorito de los entusiastas del tuning.',
                'image_path' => 'products/Aros XXR 527.jpg',
                'price' => 400.0,
                'category_id' => 1,
            ],

            // Llantas (10 productos)
            [
                'sku' => 2001,
                'name' => 'Michelin Pilot Sport 4',
                'description' => 'Máximo desempeño en curvas y frenado.',
                'image_path' => 'products/Michelin Pilot Sport 4.png',
                'price' => 200.0,
                'category_id' => 2,
            ],
            [
                'sku' => 2002,
                'name' => 'Bridgestone Dueler H/T',
                'description' => 'Ideal para terrenos mixtos.',
                'image_path' => 'products/Bridgestone Dueler HT.png',
                'price' => 180.0,
                'category_id' => 2,
            ],
            [
                'sku' => 2003,
                'name' => 'Goodyear Eagle F1',
                'description' => 'Llantas deportivas de alto rendimiento.',
                'image_path' => 'products/Goodyear Eagle F1.jpg',
                'price' => 220.0,
                'category_id' => 2,
            ],
            [
                'sku' => 2004,
                'name' => 'Pirelli Scorpion Verde',
                'description' => 'Ecológicas y duraderas para SUVs.',
                'image_path' => 'products/Pirelli Scorpion Verde.png',
                'price' => 190.0,
                'category_id' => 2,
            ],
            [
                'sku' => 2005,
                'name' => 'Continental CrossContact LX25',
                'description' => 'Excelente confort en carretera.',
                'image_path' => 'products/Continental CrossContact LX25.png',
                'price' => 210.0,
                'category_id' => 2,
            ],
            [
                'sku' => 2006,
                'name' => 'Hankook Ventus V12 evo2',
                'description' => 'Alta precisión para autos deportivos.',
                'image_path' => 'products/Hankook Ventus V12 evo2.png',
                'price' => 170.0,
                'category_id' => 2,
            ],
            [
                'sku' => 2007,
                'name' => 'Yokohama Geolandar A/T G015',
                'description' => 'Rendimiento todo terreno y confort en carretera.',
                'image_path' => 'products/Yokohama Geolandar AT G015.png',
                'price' => 185.0,
                'category_id' => 2,
            ],
            [
                'sku' => 2008,
                'name' => 'BFGoodrich All-Terrain T/A KO2',
                'description' => 'Resistencia superior para off-road.',
                'image_path' => 'products/BFGoodrich All-Terrain TA KO2.png',
                'price' => 200.0,
                'category_id' => 2,
            ],
            [
                'sku' => 2009,
                'name' => 'Kumho Ecsta PS31',
                'description' => 'Rendimiento excelente en mojado.',
                'image_path' => 'products/Kumho Ecsta PS31.png',
                'price' => 150.0,
                'category_id' => 2,
            ],
            [
                'sku' => 2010,
                'name' => 'Falken Wildpeak A/T3W',
                'description' => 'Versátil para carretera y todo terreno.',
                'image_path' => 'products/Falken Wildpeak AT3W.png',
                'price' => 175.0,
                'category_id' => 2,
            ],

            // Baterías (10 productos)
            [
                'sku' => 3001,
                'name' => 'Batería Optima RedTop',
                'description' => 'Ideal para arranques en clima extremo.',
                'image_path' => 'products/Batería Optima RedTop.jfif',
                'price' => 200.0,
                'category_id' => 3,
            ],
            [
                'sku' => 3002,
                'name' => 'Batería Bosch S5',
                'description' => 'Alto rendimiento para vehículos de lujo.',
                'image_path' => 'products/Batería Bosch S5.jpg',
                'price' => 180.0,
                'category_id' => 3,
            ],
            [
                'sku' => 3003,
                'name' => 'Batería Exide Edge AGM',
                'description' => 'Duración prolongada y sin mantenimiento.',
                'image_path' => 'products/Batería Exide Edge AGM.jpg',
                'price' => 170.0,
                'category_id' => 3,
            ],
            [
                'sku' => 3004,
                'name' => 'Batería Varta Blue Dynamic',
                'description' => 'Excelente desempeño y durabilidad.',
                'image_path' => 'products/Batería Varta Blue Dynamic.jpg',
                'price' => 160.0,
                'category_id' => 3,
            ],
            [
                'sku' => 3005,
                'name' => 'Batería LTH AGM',
                'description' => 'Resistente a descargas profundas.',
                'image_path' => 'products/Batería LTH AGM.jpg',
                'price' => 150.0,
                'category_id' => 3,
            ],
            [
                'sku' => 3006,
                'name' => 'Batería Trojan T-105',
                'description' => 'Especial para carros de golf y energía solar.',
                'image_path' => 'products/Batería Trojan T-105.jpg',
                'price' => 220.0,
                'category_id' => 3,
            ],
            [
                'sku' => 3007,
                'name' => 'Batería Duralast Platinum',
                'description' => 'Construcción de alta calidad para mayor vida útil.',
                'image_path' => 'products/Batería Duralast Platinum.jpg',
                'price' => 190.0,
                'category_id' => 3,
            ],
            [
                'sku' => 3008,
                'name' => 'Batería Interstate MT',
                'description' => 'Fiabilidad en condiciones normales y extremas.',
                'image_path' => 'products/Batería Interstate MT.jpg',
                'price' => 140.0,
                'category_id' => 3,
            ],
            [
                'sku' => 3009,
                'name' => 'Batería Yuasa NP',
                'description' => 'Perfecta para equipos industriales y vehículos pequeños.',
                'image_path' => 'products/Batería Yuasa NP.jfif',
                'price' => 100.0,
                'category_id' => 3,
            ],
            [
                'sku' => 3010,
                'name' => 'Batería Odyssey Extreme Series',
                'description' => 'Máxima potencia para vehículos exigentes.',
                'image_path' => 'products/Batería Odyssey Extreme Series.jpg',
                'price' => 250.0,
                'category_id' => 3,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
