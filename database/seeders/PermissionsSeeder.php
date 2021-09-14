<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;



class PermissionsSeeder extends Seeder
{
    //$ php artisan db:seed --class=PermissionsTableSeeder
    private $exceptNames = [
        'LaravelInstaller*',
        'LaravelUpdater*',
        'debugbar*',
        'cashier.*'
    ];

    private $exceptControllers = [
        'LoginController',
        'ForgotPasswordController',
        'ResetPasswordController',
        'RegisterController',
        'PayPalController'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Reset cached roles and permissions
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
         
        \DB::table('permissions')->delete();
        \DB::table('role_has_permissions')->delete();

        $routesArr =array();
        $routeCollection = Route::getRoutes();
        try{
            $role = Role::findByName('admin');
            $admin = Role::findByName('admin');
            $Administrador = Role::findByName('Administrador');
            $DiretorComercial = Role::findByName('Diretor comercial');
            $ChefeDeVendas = Role::findByName('Chefe de vendas');
            $Vendedor = Role::findByName('Vendedor');

            if (!$role) {
                $role = Role::find(1);
            }
        }catch (Exception $e){
            if($e instanceof RoleDoesNotExist){
                $role = Role::create(['name' => 'admin']);
            }
        }
        foreach ($routeCollection as $route) {
            if ((!Str::contains( $route->getName(), 'api'))){
            $permission = Permission::create(['name' => $route->getName()]);

            $admin->givePermissionTo($permission);
                // array_push($routesArr, $route->getName());
                    if (Str::contains($route->getName(), ['cars', 'financings', 'users', 'proposals', 'vendors', 'home'])){
                        $Administrador->givePermissionTo($permission);
                        $DiretorComercial->givePermissionTo($permission);
                        $ChefeDeVendas->givePermissionTo($permission);
                        $Vendedor->givePermissionTo($permission);
                    }
            }
            // $permission = Permission::create(['name' => $route->getName()]);
            // $role->givePermissionTo($permission);


                // if ($this->match($route)) {
                //     // PermissionDoesNotExist
                //     try{
                //         if(!$role->hasPermissionTo($route->getName())){
                //             $permission = Permission::create(['name' => $route->getName()]);
                //             $role->givePermissionTo($permission);
                //         }
                //     }catch (Exception $e){
                //         if($e instanceof PermissionDoesNotExist){
                //             $permission = Permission::create(['name' => $route->getName()]);
                //             $role->givePermissionTo($permission);
                //         }
                //     }
                // }
        }
        // dd($routesArr);
        $user = User::find(1);
        if(!$user->hasRole('admin')){
            $user->assignRole('admin');
        }
    }

    private function match(Illuminate\Routing\Route $route)
    {
        if ($route->getName() === null) {
            return false;
        } else {
            if(preg_match('/API/',class_basename($route->getController()))){
                return false;
            }
            if (in_array(class_basename($route->getController()), $this->exceptControllers)) {
                return false;
            }
            foreach ($this->exceptNames as $except) {
                if (str_is($except, $route->getName())) {
                    return false;
                }
            }
        }
        return true;
    }
}
