<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class create_permission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'order-approval',
            'list-order',
            'list-contact',
            'reply-contact',
            'add-category',
            'edit-category',
            'delete-category',
            'add-product',
            'edit-product',
            'delete-product',
            'add-branch',
            'edit-branch',
            'delete-branch',
            'add-banner',
            'edit-banner',
            'delete-banner',
            'add-user',
            'edit-user',
            'delete-user',
            'list-review',
            'delete-review',
            'manage-permission',
            'import-goods',
            'manage-revenue'
        ];

        foreach($permissions as $item){
            $permission = Permission::create(['name' => $item]);
        }
        
    }
}
