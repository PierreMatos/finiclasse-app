<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'admin',
                'guard_name' => 'web',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Administrador',
                'guard_name' => 'web',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Chefe de Vendas',
                'guard_name' => 'web',
            ),
            3 => 
            array (
                'id' => 5,
                'name' => 'Vendedor',
                'guard_name' => 'web',
            ),
        ));
    }
}
