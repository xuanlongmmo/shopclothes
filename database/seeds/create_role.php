<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class create_role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'super-admin',
            'admin',
            'normal'
        ];
        foreach($roles as $item){
            $role = Role::create(['name' => $item]);
        }
    }
}
