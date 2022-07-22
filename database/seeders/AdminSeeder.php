<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Admin;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            ['name'=>'Super Admin','email'=>'super@gmail.com','password'=>bcrypt('SuperPassword')],
            ['name'=>'Admin','email'=>'admin@gmail.com','password'=>bcrypt('password')],
            ['name'=>'Reporter','email'=>'reporter@gmail.com','password'=>bcrypt('password')],
            ['name'=>'Editor','email'=>'editor@gmail.com','password'=>bcrypt('password')],
        ];
        $roles = [
            ['name'=>'Super Admin','slug'=>'super-admin'],
            ['name'=>'Admin','slug'=>'admin'],
            ['name'=>'Reporter','slug'=>'reporter'],
            ['name'=>'Editor','slug'=>'editor'],
        ];
        $permissions = [
            ['name' => 'Create Category','slug' => 'create-category'],
            ['name' => 'Read Category','slug' => 'read-category'],
            ['name' => 'Update Category','slug' => 'update-category'],
            ['name' => 'Delete Category','slug' => 'delete-category'],
            ['name' => 'Create News','slug' => 'create-news'],
            ['name' => 'Read News','slug' => 'read-news'],
            ['name' => 'Update News','slug' => 'update-news'],
            ['name' => 'Delete News','slug' => 'delete-news'],
            ['name' => 'Create Tags','slug' => 'create-tags'],
            ['name' => 'Read Tags','slug' => 'read-tags'],
            ['name' => 'Update Tags','slug' => 'update-tags'],
            ['name' => 'Delete Tags','slug' => 'delete-tags'],
            ['name' => 'Create Media','slug' => 'create-media'],
            ['name' => 'Read Media','slug' => 'read-media'],
            ['name' => 'Update Media','slug' => 'update-media'],
            ['name' => 'Delete Media','slug' => 'delete-media'],
            ['name' => 'Create Role','slug' => 'create-role'],
            ['name' => 'Read Role','slug' => 'read-role'],
            ['name' => 'Update Role','slug' => 'update-role'],
            ['name' => 'Delete Role','slug' => 'delete-role'],
            ['name' => 'Create Permission','slug' => 'create-permission'],
            ['name' => 'Read Permission','slug' => 'read-permission'],
            ['name' => 'Update Permission','slug' => 'update-permission'],
            ['name' => 'Delete Permission','slug' => 'delete-permission']
        ];
        Schema::disableForeignKeyConstraints();
        DB::table('admin_roles')->truncate();
        DB::table('admin_permissions')->truncate();
        DB::table('role_permissions')->truncate();
        Permission::truncate();
        Role::truncate();
        Admin::truncate();
        Schema::enableForeignKeyConstraints();
        Admin::insert($admins);
        Role::insert($roles);
        Permission::insert($permissions);

        $permissions = Permission::get()->pluck('id')->toArray();
        $permissions2 = Permission::whereIn('slug',['create-news','read-news','update-news','delete-news','create-media','read-media','update-media','delete-media'])->get()->pluck('id')->toArray();
        $permissions3 = Permission::whereIn('slug', ['create-news','read-news','update-news','delete-news'])->get()->pluck('id')->toArray();
        $role = Role::find(1);
        $role->permissions()->attach($permissions);

        $role = Role::find(2);
        $role->permissions()->attach($permissions);

        $role = Role::find(3);
        $role->permissions()->attach($permissions2);

        $role = Role::find(4);
        $role->permissions()->attach($permissions3);

        $admin = Admin::find(1);
        $admin->roles()->attach([1]);

        $admin = Admin::find(2);
        $admin->roles()->attach([2]);

        $admin = Admin::find(3);
        $admin->roles()->attach([3]);

        $admin = Admin::find(4);
        $admin->roles()->attach([4]);
    }
}
