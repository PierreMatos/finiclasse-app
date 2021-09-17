<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Repositories\UserRepository;


class RolesAndPermissionsSeeder extends Seeder
{

     /** @var  UserRepository */
     private $userRepository;

     public function __construct(UserRepository $userRepo)
     {
         $this->userRepository = $userRepo;
     }


    public function run() {

        \DB::table('roles')->delete();
        \DB::table('permissions')->delete();
        \DB::table('model_has_roles')->delete();
        \DB::table('role_has_permissions')->delete();

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // permissoes por modulos
        //TODO detalhar ao CRUD de cada model

        // Permission::create(['name' => 'benefits business studys']);
        // Permission::create(['name' => 'benefits']);
        // Permission::create(['name' => 'business study authorizations']);
        // Permission::create(['name' => 'business studys']);
        // Permission::create(['name' => 'campaigns']);
        // Permission::create(['name' => 'car categories']);
        // Permission::create(['name' => 'car classes']);
        // Permission::create(['name' => 'car conditions']);
        // Permission::create(['name' => 'car drives']);
        // Permission::create(['name' => 'car fuels']);
        // Permission::create(['name' => 'car models']);
        // Permission::create(['name' => 'cars']);
        // Permission::create(['name' => 'clients']);
        // Permission::create(['name' => 'financings']);
        // Permission::create(['name' => 'makes']);
        // Permission::create(['name' => 'proposals']);
        // Permission::create(['name' => 'stands']);
        // Permission::create(['name' => 'dashboard']);

        // create roles and assign created permissions

        // this can be done as separate statements
        // $role = Role::create(['name' => 'admin']);
        // $role->givePermissionTo('list car models');

        // or may be done by 
        
        $role = Role::create(['name' => 'admin']);

        $role = Role::create(['name' => 'Administrador']);

        $role = Role::create(['name' => 'Diretor comercial']);

        $role = Role::create(['name' => 'Chefe de vendas']);
       
        $role = Role::create(['name' => 'Vendedor']);
       
        

        // atribuir roles a users
        // $this->userRepository->find(1)->assignRole('admin');
        // $this->userRepository->find(2)->assignRole('Administrador');
        // $this->userRepository->find(3)->assignRole('Chefe de vendas');
        // $this->userRepository->find(4)->assignRole('Chefe de vendas');
        // $this->userRepository->find(5)->assignRole('Vendedor');
        // $this->userRepository->find(6)->assignRole('Vendedor');
        // $this->userRepository->find(7)->assignRole('Vendedor');
        // $this->userRepository->find(8)->assignRole('Vendedor');
        
    }
}