<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       //\App\Models\User::factory(20)->create();
       \App\Models\User::create([
           'name' => 'Francisco Martinez',
           'email' => 'pakitofama28@gmail.com',
           'password' => bcrypt('App199528@')
       ]);
       \App\Models\User::create([
           'name' => 'nuevo',
           'email' => 'nuevo@gmail.com',
           'password' => bcrypt('nuevo12345')
       ]);

        \App\Models\Category::create([
           'name_cat' => 'Restaurante',
           'description_cat' => 'Negociod de comidas',
           'picture' =>'findo' ,
           'file_icon' => 'icon',
           'status_cat' => 'DRAFT'
       ]);
        \App\Models\Category::create([
           'name_cat' => 'Conveniencia',
           'description_cat' => 'Productos de abarrotes ',
           'picture' =>'findo' ,
           'file_icon' => 'icon',
           'status_cat' => 'DRAFT'
       ]);
        \App\Models\Category::create([
           'name_cat' => 'Flores y Regalos',
           'description_cat' => 'tiendas de flores y regalos',
           'picture' =>'findo' ,
           'file_icon' => 'icon',
           'status_cat' => 'DRAFT'
       ]);

        $this->call(PermissionsTableSeeder::class);
    }
}
