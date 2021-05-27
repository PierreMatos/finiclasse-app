<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BenefitsBusinessStudysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('benefits_business_studies')->delete();

        \DB::table('benefits_business_studies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'benefits_id' => 1,
                'business_study_id' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            1 => 
            array (
                'id' => 2,
                'benefits_id' => 1,
                'business_study_id' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
            2 => 
            array (
                'id' => 3,
                'benefits_id' => 1,
                'business_study_id' => 1,
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),
        ));
    }
}
