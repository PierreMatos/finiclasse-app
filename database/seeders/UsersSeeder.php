<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Repositories\UserRepository;


class UsersSeeder extends Seeder
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@demo.com',
                'mobile_phone' => NULL,
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'remember_token' => 'T4PQhFvBcAA7k02f7ejq4I7z7QKKnvxQLV0oqGnuS6Ktz6FdWULrWrzZ3oYn',
                'stand_id' => 1,
                'finiclasse_employee' => 1,
                'created_at' => '2018-08-06 22:58:41',
                'updated_at' => '2019-09-27 07:49:45',
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Administrador',
                'email' => 'administrador@demo.com',
                'mobile_phone' => NULL,
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'remember_token' => '5nysjzVKI4LU92bjRqMUSYdOaIo1EcPC3pIMb6Tcj2KXSUMriGrIQ1iwRdd0',
                'stand_id' => 1,
                'finiclasse_employee' => 1,
                'created_at' => '2018-08-14 17:06:28',
                'updated_at' => '2019-09-25 22:09:35',
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Chefe de vendas',
                'email' => 'chefedevendasguarda@demo.com',
                'mobile_phone' => NULL,
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'remember_token' => 'V6PIUfd8JdHT2zkraTlnBcRSINZNjz5Ou7N0WtUGRyaTweoaXKpSfij6UhqC',
                'stand_id' => 1,
                'finiclasse_employee' => 1,
                'created_at' => '2019-10-12 22:31:26',
                'updated_at' => '2020-03-29 17:44:30',

            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'Chefe de vendas',
                'email' => 'chefedevendasviseu@demo.com',
                'mobile_phone' => NULL,
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'remember_token' => 'V6PIUfd8JdHT2zkraTlnBcRSINZNjz5Ou7N0WtUGRyaTweoaXKpSfij6UhqC',
                'stand_id' => 2,
                'finiclasse_employee' => 1,
                'created_at' => '2019-10-12 22:31:26',
                'updated_at' => '2020-03-29 17:44:30',

            ),

            8 =>
            array(
                'id' => 9,
                'name' => 'Cliente',
                'email' => 'cliente@demo.com',
                'mobile_phone' => NULL,
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'stand_id' => 1,
                'finiclasse_employee' => 0,
                'remember_token' => NULL,
                'created_at' => '2019-10-15 17:55:39',
                'updated_at' => '2020-03-29 17:59:39',
            ),

            9 =>
            array(
                'id' => 10,
                'name' => 'José Teixeira',
                'email' => 'jose.teixeira@finiclasse.pt',
                'mobile_phone' => NULL,
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'stand_id' => 2,
                'finiclasse_employee' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-10-15 17:55:39',
                'updated_at' => '2020-03-29 17:59:39',
            ),

            10 =>
            array(
                'id' => 11,
                'name' => 'Patrício Lopes',
                'email' => 'patricio.lopes@finiclasse.com',
                'mobile_phone' => NULL,
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'stand_id' => 1,
                'finiclasse_employee' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-10-15 17:55:39',
                'updated_at' => '2020-03-29 17:59:39',
            ),

            11 =>
            array(
                'id' => 12,
                'name' => 'Sandro Lopes',
                'email' => 'sandro.lopes@finiclasse.com',
                'mobile_phone' => NULL,
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'stand_id' => 1,
                'finiclasse_employee' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-10-15 17:55:39',
                'updated_at' => '2020-03-29 17:59:39',
            ),
            12 =>
            array(
                'id' => 13,
                'name' => 'Francisco Fernandes',
                'email' => 'fffernandes@finiclasse.com',
                'mobile_phone' => NULL,
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'stand_id' => 2,
                'finiclasse_employee' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-10-15 17:55:39',
                'updated_at' => '2020-03-29 17:59:39',
            ),
            13 =>
            array(
                'id' => 14,
                'name' => 'Agostinho Barroso',
                'email' => 'agostinho.barroso@finiclasse.com',
                'mobile_phone' => NULL,
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'stand_id' => 2,
                'finiclasse_employee' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-10-15 17:55:39',
                'updated_at' => '2020-03-29 17:59:39',
            ),
            14 =>
            array(
                'id' => 15,
                'name' => 'Hugo Coito',
                'email' => 'hugo.coito@finiclasse.com',
                'mobile_phone' => NULL,
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'stand_id' => 2,
                'finiclasse_employee' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-10-15 17:55:39',
                'updated_at' => '2020-03-29 17:59:39',
            ),
            15 =>
            array(
                'id' => 16,
                'name' => 'Bruno Fernandes',
                'email' => 'bruno.fernandes@finiclasse.pt',
                'mobile_phone' => NULL,
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'stand_id' => 2,
                'finiclasse_employee' => 1,
                'remember_token' => NULL,
                'created_at' => '2019-10-15 17:55:39',
                'updated_at' => '2020-03-29 17:59:39',
            ),
            16 =>
            array(
                'id' => 17,
                'name' => 'Orlando Carvalho',
                'email' => 'orlando.carvalho31@gmail.com',
                'mobile_phone' => NULL,
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'remember_token' => '5nysjzVKI4LU92bjRqMUSYdOaIo1EcPC3pIMb6Tcj2KXSUMriGrIQ1iwRdd0',
                'stand_id' => 1,
                'finiclasse_employee' => 1,
                'created_at' => '2018-08-14 17:06:28',
                'updated_at' => '2019-09-25 22:09:35',
            ),
            17 =>
            array(
                'id' => 18,
                'name' => 'Paulo Duarte',
                'email' => 'paulo.duarte@finiclasse.pt',
                'mobile_phone' => NULL,
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'remember_token' => '5nysjzVKI4LU92bjRqMUSYdOaIo1EcPC3pIMb6Tcj2KXSUMriGrIQ1iwRdd0',
                'stand_id' => 2,
                'finiclasse_employee' => 1,
                'created_at' => '2018-08-14 17:06:28',
                'updated_at' => '2019-09-25 22:09:35',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Pedro Liberato',
                'email' => 'liberato.p@finiclasse.pt',
                'mobile_phone' => NULL,
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'remember_token' => '5nysjzVKI4LU92bjRqMUSYdOaIo1EcPC3pIMb6Tcj2KXSUMriGrIQ1iwRdd0',
                'stand_id' => 2,
                'finiclasse_employee' => 1,
                'created_at' => '2018-08-14 17:06:28',
                'updated_at' => '2019-09-25 22:09:35',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'User Teste',
                'email' => 'userteste@mail.com',
                'mobile_phone' => '915089459',
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'stand_id' => 1,
                'finiclasse_employee' => 0,
                'remember_token' => NULL,
                'created_at' => '2022-04-15 17:00:00',
                'updated_at' => '2022-04-25 17:00:00',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Laravel Tester',
                'email' => 'laravelteste2021@gmail.com',
                'mobile_phone' => '916278648',
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'stand_id' => 2,
                'finiclasse_employee' => 0,
                'remember_token' => NULL,
                'created_at' => '2022-04-15 17:00:01',
                'updated_at' => '2022-04-25 17:00:01',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Gatts Tester',
                'email' => 'gatts.smurf1@gmail.com',
                'mobile_phone' => '913372053',
                'password' => '$2y$10$YOn/Xq6vfvi9oaixrtW8QuM2W0mawkLLqIxL.IoGqrsqOqbIsfBNu',
                'stand_id' => 2,
                'finiclasse_employee' => 0,
                'remember_token' => NULL,
                'created_at' => '2022-04-15 17:00:02',
                'updated_at' => '2022-04-25 17:00:02',
            )

        ));

        // atribuir roles a users
        $this->userRepository->find(2)->assignRole('Administrador');
        $this->userRepository->find(13)->assignRole('Administrador');
        $this->userRepository->find(16)->assignRole('Administrador');
        $this->userRepository->find(17)->assignRole('Administrador');
        $this->userRepository->find(18)->assignRole('Diretor comercial');
        $this->userRepository->find(3)->assignRole('Chefe de vendas');
        $this->userRepository->find(4)->assignRole('Chefe de vendas');
        $this->userRepository->find(11)->assignRole('Chefe de vendas');
        $this->userRepository->find(15)->assignRole('Chefe de vendas');
        $this->userRepository->find(10)->assignRole('Vendedor');
        $this->userRepository->find(12)->assignRole('Vendedor');
        $this->userRepository->find(14)->assignRole('Vendedor');
        
    }
}
