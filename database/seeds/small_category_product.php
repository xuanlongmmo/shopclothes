<?php

use Illuminate\Database\Seeder;

class small_category_product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('small_category_product')->insert([
            ['small_category_name'=>'Premier League','slug_name'=>'premier_league','id_large_category'=>1],
            ['small_category_name'=>'La Liga','slug_name'=>'laliga','id_large_category'=>1],
            ['small_category_name'=>'Serie A','slug_name'=>'seriea','id_large_category'=>1],
            ['small_category_name'=>'League One','slug_name'=>'league1','id_large_category'=>1],
            ['small_category_name'=>'Bundesliga','slug_name'=>'bundesliga','id_large_category'=>1],
            ['small_category_name'=>'Châu Âu','slug_name'=>'europe','id_large_category'=>2],
            ['small_category_name'=>'Châu Mỹ','slug_name'=>'americas','id_large_category'=>2],
            ['small_category_name'=>'Châu Á','slug_name'=>'asia','id_large_category'=>2],
            ['small_category_name'=>'Châu Phi','slug_name'=>'africa','id_large_category'=>2]
        ]);
    }
}
