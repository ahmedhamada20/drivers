<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
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

        $this->call(CurrencySeeder::class);
//
//        Schema::disableForeignKeyConstraints();
//        DB::table('permissions')->delete();
//        DB::table('roles')->delete();
//
//        DB::table('role_has_permissions')->truncate();
//
//         $this->call(PermissionTableSeeder::class);
//
////         DB::table('users')->where('is_admin',1)->delete();
//
//
//        $user = User::create([
//            'firstname' => 'super',
//            'lastname' => 'admin',
//            'email'=>'admin@movex.com',
//            'password'=> bcrypt('movex@123456'),
//            'type' => 1,
//            'status' => 1,
//            'is_admin' =>1,
//        ]);
//
//        $role = Role::create(['name' => 'Admin']);
//
//        $permissions = Permission::pluck('id','id')->all();
//
//        $role->syncPermissions($permissions);
//
//        $user->assignRole([$role->id]);
//
//        Schema::enableForeignKeyConstraints();
    }
}
