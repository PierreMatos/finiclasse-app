<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BenefitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('benefits')->delete();

        \DB::table('benefits')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Apoio Frotista',
                'type' => '%',
                'amount' => '20',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Apoio Grande Frotista',
                'type' => '%',
                'amount' => '25',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Bombeiro',
                'type' => '€',
                'amount' => '1200',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
        ));
    }
}
