<?php

use Illuminate\Database\Seeder;

class large_category_product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('large_category_product')->insert([
            ['large_category_name'=>'Áo câu lạc bộ','slug_name'=>'club'],
            ['large_category_name'=>'Áo đội tuyển quốc gia','slug_name'=>'national'],
            ['large_category_name'=>'Áo không logo','slug_name'=>'nologo']
        ]);
    }
}
