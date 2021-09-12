<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();
        
        User::factory()
        ->count(10)
        ->create();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@demo.com',
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'remember_token' => 'T4PQhFvBcAA7k02f7ejq4I7z7QKKnvxQLV0oqGnuS6Ktz6FdWULrWrzZ3oYn',
                'stand_id' => 1,
                'finiclasse_employee' => 1,
                'created_at' => '2018-08-06 22:58:41',
                'updated_at' => '2019-09-27 07:49:45',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Administrador',
                'email' => 'administrador@demo.com',
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'remember_token' => '5nysjzVKI4LU92bjRqMUSYdOaIo1EcPC3pIMb6Tcj2KXSUMriGrIQ1iwRdd0',
                'stand_id' => 1,
                'finiclasse_employee' => 1,
                'created_at' => '2018-08-14 17:06:28',
                'updated_at' => '2019-09-25 22:09:35',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Chefe de vendas',
                'email' => 'chefedevendas@demo.com',
                'password' => '$2y$10$EBubVy3wDbqNbHvMQwkj3OTYVitL8QnHvh/zV0ICVOaSbALy5dD0K',
                'remember_token' => 'V6PIUfd8JdHT2zkraTlnBcRSINZNjz5Ou7N0WtUGRyaTweoaXKpSfij6UhqC',
                'stand_id' => 1,
                'finiclasse_employee' => 1,
                'created_at' => '2019-10-12 22:31:26',
                'updated_at' => '2020-03-29 17:44:30',
                
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Vendedor',
                'email' => 'vendedor@demo.com',
                'password' => '$2y$10$pmdnepS1FhZUMqOaFIFnNO0spltJpziz3j13UqyEwShmLhokmuoei',
                'stand_id' => 1,
                'finiclasse_employee' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-10-15 17:55:39',
                'updated_at' => '2020-03-29 17:59:39',
               
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Cliente',
                'email' => 'cliente@demo.com',
                'password' => '$2y$10$pmdnepS1FhZUMqOaFIFnNO0spltJpziz3j13UqyEwShmLhokmuoei',
                'stand_id' => 1,
                'finiclasse_employee' => 0,
                'remember_token' => NULL,
                'created_at' => '2019-10-15 17:55:39',
                'updated_at' => '2020-03-29 17:59:39',
               
            )
        ));
    }
}
