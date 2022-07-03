<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert([
            ['name'=>'Admin','email'=>'admin@gmail.com','password'=>bcrypt('password')],
            ['name'=>'Editor','email'=>'editor@gmail.com','password'=>bcrypt('password')],
            ['name'=>'Author','email'=>'author@gmail.com','password'=>bcrypt('password')],
        ]);

        Role::insert([
            ['name'=>'Admin','slug'=>'admin'],
            ['name'=>'Editor','slug'=>'editor'],
            ['name'=>'Author','slug'=>'author'],
        ]);

        Permission::insert([
            ['name'=>'Create Info','slug'=>'create-info'],
            ['name'=>'Read Info','slug'=>'read-info'],
            ['name'=>'Update Info','slug'=>'update-info'],
            ['name'=>'Delete Info','slug'=>'delete-info'],
        ]);

        $role = Role::find(1);
        $role->permissions()->attach([1,2,3,4]);

        $role = Role::find(2);
        $role->permissions()->attach([1,2,4]);

        $role = Role::find(3);
        $role->permissions()->attach([1,2]);

        $admin = Admin::find(1);
        $admin->roles()->attach([1]);

        $admin = Admin::find(2);
        $admin->roles()->attach([2]);

        $admin = Admin::find(3);
        $admin->roles()->attach([3]);
    }
}
