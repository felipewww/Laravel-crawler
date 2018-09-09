<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $i = 30;
        while ($i > 0){

            DB::table('articles')->insert([
                'user_id' => 1,
                'titulo' => $faker->text(20),
                'resumo' => $faker->paragraphs(3, true),
                'link' => $faker->url,
            ]);

            $i--;
        }
    }
}
