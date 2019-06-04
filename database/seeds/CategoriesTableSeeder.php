<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'nome' => 'Eletrodomesticos'
        ]);

        DB::table('categories')->insert([
            'nome' => 'Papelaria'
        ]);

        DB::table('categories')->insert([
            'nome' => 'Moveis'
        ]);

        DB::table('categories')->insert([
            'nome' => 'Cama'
        ]);

        DB::table('categories')->insert([
            'nome' => 'Mesa'
        ]);

        DB::table('categories')->insert([
            'nome' => 'Banho'
        ]);
    }
}
