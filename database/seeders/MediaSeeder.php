<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('media')->delete();


        \DB::table('media')->insert(array (

            0 => 
            array (
                'id' => '1',
                'model_type' => 'App\Models\Car',
                'model_id' => '1',
                'collection_name' => 'default',
                'name' => 'x450dfaq4el5hmf1icn1tqph5e2',
                'file_name' => 'x450dfaq4el5hmf1icn1tqph5e2.jpg',
                'mime_type' => 'image/png',
                'disk' => 'avatars',
                'conversions_disk' => 'avatars',
                'size' => '545791',
                'manipulations' => '[]',
                'custom_properties' => '[]',
                'generated_conversions' => '[]',
                'responsive_images' => '[]',
                'order_column' => '1',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),  

            1 => 
            array (
                'id' => '2',
                'model_type' => 'App\Models\Car',
                'model_id' => '1',
                'collection_name' => 'default',
                'name' => 'xnsqagaofc5klk5yu4tr0kgbdq2',
                'file_name' => 'xnsqagaofc5klk5yu4tr0kgbdq2.jpg',
                'mime_type' => 'image/png',
                'disk' => 'avatars',
                'conversions_disk' => 'avatars',
                'size' => '545791',
                'manipulations' => '[]',
                'custom_properties' => '[]',
                'generated_conversions' => '[]',
                'responsive_images' => '[]',
                'order_column' => '3',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),  

            2 => 
            array (
                'id' => '3',
                'model_type' => 'App\Models\Car',
                'model_id' => '1',
                'collection_name' => 'default',
                'name' => 'kobgv21jreyfo1jq01hwdkfave2',
                'file_name' => 'kobgv21jreyfo1jq01hwdkfave2.jpg',
                'mime_type' => 'image/png',
                'disk' => 'avatars',
                'conversions_disk' => 'avatars',
                'size' => '545791',
                'manipulations' => '[]',
                'custom_properties' => '[]',
                'generated_conversions' => '[]',
                'responsive_images' => '[]',
                'order_column' => '2',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),  

            3 => 
            array (
                'id' => '4',
                'model_type' => 'App\Models\Car',
                'model_id' => '2',
                'collection_name' => 'default',
                'name' => 't051hzljdmp0d1gl3pqzsxfu522',
                'file_name' => 't051hzljdmp0d1gl3pqzsxfu522.jpg',
                'mime_type' => 'image/png',
                'disk' => 'avatars',
                'conversions_disk' => 'avatars',
                'size' => '545791',
                'manipulations' => '[]',
                'custom_properties' => '[]',
                'generated_conversions' => '[]',
                'responsive_images' => '[]',
                'order_column' => '2',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),  

            4 => 
            array (
                'id' => '5',
                'model_type' => 'App\Models\Car',
                'model_id' => '2',
                'collection_name' => 'default',
                'name' => 'hiw2wszgxw5pvgy4cbcrz2bdoi2',
                'file_name' => 'hiw2wszgxw5pvgy4cbcrz2bdoi2.jpg',
                'mime_type' => 'image/png',
                'disk' => 'avatars',
                'conversions_disk' => 'avatars',
                'size' => '545791',
                'manipulations' => '[]',
                'custom_properties' => '[]',
                'generated_conversions' => '[]',
                'responsive_images' => '[]',
                'order_column' => '2',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),

            5 => 
            array (
                'id' => '6',
                'model_type' => 'App\Models\Car',
                'model_id' => '3',
                'collection_name' => 'default',
                'name' => 'glc',
                'file_name' => 'glc.jpg',
                'mime_type' => 'image/png',
                'disk' => 'avatars',
                'conversions_disk' => 'avatars',
                'size' => '545791',
                'manipulations' => '[]',
                'custom_properties' => '[]',
                'generated_conversions' => '[]',
                'responsive_images' => '[]',
                'order_column' => '2',
                'created_at' => '2019-10-22 15:50:48',
                'updated_at' => '2019-10-22 15:50:48',
            ),

        ));

    }
}
