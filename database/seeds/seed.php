<?php

use Illuminate\Database\Seeder;

class seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=24;$i++){
            DB::table('user_has_permission')->insert([
                ['id_user'=>1,'id_permission'=>$i],
            ]);
        }
    }
}
