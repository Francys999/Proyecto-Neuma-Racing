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
            
            // Productos de la categoría "Aros" para Automoviles (category_id = 1)
            [
                'sku' => 1001,
                'name' => 'Aros Deportivos OZ Racing',
                'description' => 'Aros de diseño deportivo y peso ligero.',
                'image_path' => 'products/aroautomovil.jpg',
                'price' => 300.0,
                'category_id' => 1,
            ],
            [
                'sku' => 1002,
                'name' => 'Aros de Aleación BBS',
                'description' => 'Aros de alta calidad y resistencia.',
                'image_path' => 'products/aroautomovil.jpg',
                'price' => 320.0,
                'category_id' => 1,
            ],
            [
                'sku' => 1003,
                'name' => 'Aros Enkei Tuning',
                'description' => 'Aros diseñados para autos de alto rendimiento.',
                'image_path' => 'products/aroautomovil.jpg',
                'price' => 310.0,
                'category_id' => 1,
            ],
            [
                'sku' => 1004,
                'name' => 'Aros RAYS Gram Lights',
                'description' => 'Aros ultraligeros para máxima agilidad.',
                'image_path' => 'products/aroautomovil.jpg',
                'price' => 350.0,
                'category_id' => 1,
            ],
            [
                'sku' => 1005,
                'name' => 'Aros American Racing Vintage',
                'description' => 'Aros clásicos para un toque retro.',
                'image_path' => 'products/aroautomovil.jpg',
                'price' => 290.0,
                'category_id' => 1,
            ],
            [
                'sku' => 1006,
                'name' => 'Aros Borbet Luxury',
                'description' => 'Aros de lujo con diseño elegante.',
                'image_path' => 'products/aroautomovil.jpg',
                'price' => 400.0,
                'category_id' => 1,
            ],
            [
                'sku' => 1007,
                'name' => 'Aros MOMO Hyperstar',
                'description' => 'Aros deportivos con excelente acabado.',
                'image_path' => 'products/aroautomovil.jpg',
                'price' => 360.0,
                'category_id' => 1,
            ],
            [
                'sku' => 1008,
                'name' => 'Aros Rotiform Aerodiscs',
                'description' => 'Aros innovadores con diseño distintivo.',
                'image_path' => 'products/aroautomovil.jpg',
                'price' => 330.0,
                'category_id' => 1,
            ],
            [
                'sku' => 1009,
                'name' => 'Aros Fuel Off-Road',
                'description' => 'Aros para vehículos todo terreno.',
                'image_path' => 'products/aroautomovil.jpg',
                'price' => 340.0,
                'category_id' => 1,
            ],

            // Productos de la categoría "Llantas" para aútomoviles (category_id = 2)
            [
                'sku' => 2001,
                'name' => 'Llantas Triangle',
                'description' => 'Llantas de alta resistencia para terrenos irregulares.',
                'image_path' => 'products/llantaautomovil.jpg',
                'price' => 150.0,
                'category_id' => 2,
            ],
            [
                'sku' => 2002,
                'name' => 'Llantas Radiales Michelin',
                'description' => 'Llantas deportivas de alta calidad',
                'image_path' => 'products/llantaautomovil.jpg',
                'price' => 200.0,
                'category_id' => 2,
            ],
            [
                'sku' => 2003,
                'name' => 'Llantas Bridgestone Potenza',
                'description' => 'Llantas deportivas de alta velocidad.',
                'image_path' => 'products/llantaautomovil.jpg',
                'price' => 220.0,
                'category_id' => 2,
            ],
            [
                'sku' => 2004,
                'name' => 'Llantas Pirelli Scorpion',
                'description' => 'Llantas todo terreno con gran durabilidad.',
                'image_path' => 'products/llantaautomovil.jpg',
                'price' => 280.0,
                'category_id' => 2,
            ],
            [
                'sku' => 2005,
                'name' => 'Llantas Goodyear EfficientGrip',
                'description' => 'Llantas de alto rendimiento y bajo ruido.',
                'image_path' => 'products/llantaautomovil.jpg',
                'price' => 220.0,
                'category_id' => 2,
            ],
            [
                'sku' => 2006,
                'name' => 'Llantas Hankook Ventus',
                'description' => 'Llantas premium para un manejo suave.',
                'image_path' => 'products/llantaautomovil.jpg',
                'price' => 290.0,
                'category_id' => 2,
            ],
            [
                'sku' => 2007,
                'name' => 'Llantas Yokohama Geolandar',
                'description' => 'Llantas todoterreno con excelente tracción.',
                'image_path' => 'products/llantaautomovil.jpg',
                'price' => 270.0,
                'category_id' => 2,
            ],
            [
                'sku' => 2008,
                'name' => 'Llantas Continental PremiumContact',
                'description' => 'Llantas seguras y confiables para todas las estaciones.',
                'image_path' => 'products/llantaautomovil.jpg',
                'price' => 230.0,
                'category_id' => 2,
            ],
            [
                'sku' => 2009,
                'name' => 'Llantas Firestone Destination',
                'description' => 'Llantas duraderas para condiciones difíciles.',
                'image_path' => 'products/llantaautomovil.jpg',
                'price' => 260.0,
                'category_id' => 2,
            ],
            [
                'sku' => 2010,
                'name' => 'Llantas Dunlop Grandtrek',
                'description' => 'Llantas ideales para SUV y 4x4.',
                'image_path' => 'products/llantaautomovil.jpg',
                'price' => 275.0,
                'category_id' => 2,
            ],

            // Productos de la categoría "Baterías" para Automoviles (category_id = 3)
            [
                'sku' => 3001,
                'name' => 'Batería Bosch S5',
                'description' => 'Batería de alta duración y rendimiento.',
                'image_path' => 'products/bateriaautomovil.jpg',
                'price' => 120.0,
                'category_id' => 3,
            ],
            [
                'sku' => 3002,
                'name' => 'Batería AC Delco Professional',
                'description' => 'Batería de alto rendimiento para condiciones extremas.',
                'image_path' => 'products/bateriaautomovil.jpg',
                'price' => 130.0,
                'category_id' => 3,
            ],
            [
                'sku' => 3003,
                'name' => 'Batería LTH Powerframe',
                'description' => 'Batería confiable con tecnología avanzada.',
                'image_path' => 'products/bateriaautomovil.jpg',
                'price' => 110.0,
                'category_id' => 3,
            ],
            [
                'sku' => 3004,
                'name' => 'Batería Optima YellowTop',
                'description' => 'Batería para sistemas de alta demanda.',
                'image_path' => 'products/bateriaautomovil.jpg',
                'price' => 150.0,
                'category_id' => 3,
            ],

            [
                'sku' => 3005,
                'name' => 'Batería Bosch S5',
                'description' => 'Batería de alta duración y rendimiento.',
                'image_path' => 'products/bateriaautomovil.jpg',
                'price' => 120.0,
                'category_id' => 3,
            ],
            [
                'sku' => 3006,
                'name' => 'Batería AC Delco Professional',
                'description' => 'Batería de alto rendimiento para condiciones extremas.',
                'image_path' => 'products/bateriaautomovil.jpg',
                'price' => 130.0,
                'category_id' => 3,
            ],
            [
                'sku' => 3007,
                'name' => 'Batería LTH Powerframe',
                'description' => 'Batería confiable con tecnología avanzada.',
                'image_path' => 'products/bateriaautomovil.jpg',
                'price' => 110.0,
                'category_id' => 3,
            ],
            [
                'sku' => 3008,
                'name' => 'Batería Optima YellowTop',
                'description' => 'Batería para sistemas de alta demanda.',
                'image_path' => 'products/bateriaautomovil.jpg',
                'price' => 150.0,
                'category_id' => 3,
            ],
            [
                'sku' => 3009,
                'name' => 'Batería LTH Powerframe',
                'description' => 'Batería confiable con tecnología avanzada.',
                'image_path' => 'products/bateriaautomovil.jpg',
                'price' => 110.0,
                'category_id' => 3,
            ],
            [
                'sku' => 3010,
                'name' => 'Batería Optima YellowTop',
                'description' => 'Batería para sistemas de alta demanda.',
                'image_path' => 'products/bateriaautomovil.jpg',
                'price' => 150.0,
                'category_id' => 3,
            ],
            
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
