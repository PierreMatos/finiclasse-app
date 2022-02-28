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
        
        $role = Role::create(['id' => 84, 'name' => 'admin']);

        $role = Role::create(['id' => 85, 'name' => 'Administrador']);

        $role = Role::create(['id' => 86, 'name' => 'Diretor comercial']);

        $role = Role::create(['id' => 87, 'name' => 'Chefe de vendas']);
       
        $role = Role::create(['id' => 88, 'name' => 'Vendedor']);
       
    }
}