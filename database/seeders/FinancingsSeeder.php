<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FinancingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('financings')->delete();

        \DB::table('financings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Financiamentos Internos',
                'description' => 'Financiamentos internos',
                'document' => null,
                'created_at' => '2022-02-25 14:00:00',
                'updated_at' => '2022-02-25 14:00:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Financiamentos Externos',
                'description' => 'Financiamentos externos',
                'document' => null,
                'created_at' => '2022-02-25 14:00:00',
                'updated_at' => '2022-02-25 14:00:00',
            ),
        ));
    }
}
