<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Clothes;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'surname' => 'admin',
                'birthdate' => '1980-01-01',
                'occupation' => 'worker',
                'personality' => 'boss',
                'email' => 'admin@example.com',
                'password' => 12345678,
                'role' => 'admin',
            ],
            [
                'name' => 'Jane',
                'surname' => 'Doe',
                'birthdate' => '1985-01-01',
                'occupation' => 'student',
                'personality' => 'reserved',
                'email' => 'user@example.com',
                'password' => 12345678,
                'role' => 'user',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        $categories = [
            [
                'name' => 'Camisetas-Camisas',
                'description' => 'Parte de arriba',
                'image' => 'fondocamisetas.png',

            ],
            [
                'name' => 'Pantalones',
                'description' => 'Distintos tipos de pantalones',
                'image' => 'fondopantalones.png',

            ],
            [
                'name' => 'Abrigos',
                'description' => 'Sobrecamisetas o abrigos',
                'image' => 'fondocamisas.png',

            ],
            [
                'name' => 'Zapatos',
                'description' => 'Distintos tipos de zapatos',
                'image' => 'fondozapatos.png',

            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        $events = [
            [
                'name' => 'Casual',
                'description' => 'Ropa informal para salir con los amigos.',
            ],
            [
                'name' => 'Oficina',
                'description' => 'Ropa formal para ir arreglado al trabajo.',
            ],
            [
                'name' => 'Deporte',
                'description' => 'Ropa cómoda para practicar deporte.',
            ],
            [
                'name' => 'Estar por casa',
                'description' => 'Ropa cómoda para estar en casa.',
            ],
            [
                'name' => 'Celebraciones',
                'description' => 'Ropa muy formal típica de bodas o comuniones.',
            ],
            [
                'name' => 'Playero',
                'description' => 'Perfecto para ir a la playa o la piscina.',
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }

        $clothes = [
            [
                'name' => 'Camiseta negra',
                'color' => 'negro',
                'season' => 'all',
                'image' => 'image-1.jpg',
                'comfort_level' => 8,
                'general' => true,
                'category_id' => 1,
            ],
            [
                'name' => 'Pantalón vaquero corto',
                'color' => 'azul',
                'season' => 'summer',
                'image' => 'image-2.jpg',
                'comfort_level' => 7,
                'general' => true,
                'category_id' => 2,
            ],
            [
                'name' => 'Pantalón Vaquero',
                'color' => 'azul',
                'season' => 'all',
                'image' => 'image-3.jpg',
                'comfort_level' => 6,
                'general' => true,
                'category_id' => 2,
            ],
            [
                'name' => 'Camiseta Blanca',
                'color' => 'blanco',
                'season' => 'all',
                'image' => 'image-4.jpg',
                'comfort_level' => 8,
                'general' => true,
                'category_id' => 1,
            ],
            [
                'name' => 'Zapatillas deportivas',
                'color' => 'blanco',
                'season' => 'all',
                'image' => 'image-5.jpg',
                'comfort_level' => 8,
                'general' => true,
                'category_id' => 4,
            ],
            [
                'name' => 'Pantalón Deportivo',
                'color' => 'negro',
                'season' => 'all',
                'image' => 'image-6.jpg',
                'comfort_level' => 8,
                'general' => true,
                'category_id' => 2,
            ],
            [
                'name' => 'Camisa blanca',
                'color' => 'blanco',
                'season' => 'all',
                'image' => 'image-7.jpg',
                'comfort_level' => 5,
                'general' => true,
                'category_id' => 1,
            ],
            [
                'name' => 'Zapatos de traje',
                'color' => 'negro',
                'season' => 'all',
                'image' => 'image-8.jpg',
                'comfort_level' => 3,
                'general' => true,
                'category_id' => 4,
            ],
            [
                'name' => 'Sudadera',
                'color' => 'gris',
                'season' => 'winter',
                'image' => 'image-9.jpg',
                'comfort_level' => 7,
                'general' => true,
                'category_id' => 3,
            ],
            [
                'name' => 'Chaqueta de Cuero',
                'color' => 'marrón',
                'season' => 'winter',
                'image' => 'image-10.jpg',
                'comfort_level' => 6,
                'general' => true,
                'category_id' => 3,
            ],
            [
                'name' => 'Bañador Azul',
                'color' => 'azul',
                'season' => 'summer',
                'image' => 'image-11.jpg',
                'comfort_level' => 7,
                'general' => true,
                'category_id' => 2,
            ],
            [
                'name' => 'Chanclas',
                'color' => 'negro',
                'season' => 'summer',
                'image' => 'image-12.jpg',
                'comfort_level' => 6,
                'general' => true,
                'category_id' => 4,
            ],
            [
                'name' => 'Camiseta sin mangas',
                'color' => 'negro',
                'season' => 'summer',
                'image' => 'image-13.jpg',
                'comfort_level' => 9,
                'general' => true,
                'category_id' => 1,
            ],
            [
                'name' => 'Chaqueta de traje',
                'color' => 'negro',
                'season' => 'all',
                'image' => 'image-14.jpg',
                'comfort_level' => 2,
                'general' => true,
                'category_id' => 3,
            ],
            
        ];

        foreach ($clothes as $clothing) {
            Clothes::create($clothing);
        }
    }
}
