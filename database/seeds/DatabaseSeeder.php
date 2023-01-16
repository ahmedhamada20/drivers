<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('permissions')->delete();
        \Illuminate\Support\Facades\DB::table('roles')->delete();

        \Illuminate\Support\Facades\DB::table('role_has_permissions')->truncate();

         $this->call(PermissionTableSeeder::class);

         \App\User::where('is_admin',1)->delete();


        $user = User::create([
            'firstname' => 'super',
            'lastname' => 'admin',
            'email'=>'admin@movex.com',
            'password'=> bcrypt('movex@123456'),
            'type' => 1,
            'status' => 1,
            'is_admin' =>1,
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
