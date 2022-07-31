<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Admin;
use App\Models\AdminDetail;
use App\Models\City;
use App\Models\Country;
use App\Models\Media;
use App\Models\Permission;
use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
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
            [
                'name'=>'Super Admin',
                'email'=>'super@gmail.com',
                'password'=>bcrypt('SuperPassword'),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('password'),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name'=>'Reporter',
                'email'=>'reporter@gmail.com',
                'password'=>bcrypt('password'),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name'=>'Editor',
                'email'=>'editor@gmail.com',
                'password'=>bcrypt('password'),
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
        ];
        $roles = [
            [
                'name'=>'Super Admin',
                'slug'=>'super-admin',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name'=>'Admin',
                'slug'=>'admin',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name'=>'Reporter',
                'slug'=>'reporter',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name'=>'Editor',
                'slug'=>'editor',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
        ];
        $permissions = [
            [
                'name' => 'Create Category',
                'slug' => 'create-category',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Read Category',
                'slug' => 'read-category',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Update Category',
                'slug' => 'update-category',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Delete Category',
                'slug' => 'delete-category',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Create News',
                'slug' => 'create-news',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Read News',
                'slug' => 'read-news',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Update News',
                'slug' => 'update-news',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Delete News',
                'slug' => 'delete-news',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Create Tags',
                'slug' => 'create-tags',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Read Tags',
                'slug' => 'read-tags',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Update Tags',
                'slug' => 'update-tags',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Delete Tags',
                'slug' => 'delete-tags',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Create Media',
                'slug' => 'create-media',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Read Media',
                'slug' => 'read-media',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Update Media',
                'slug' => 'update-media',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Delete Media',
                'slug' => 'delete-media',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Create Role',
                'slug' => 'create-role',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Read Role',
                'slug' => 'read-role',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Update Role',
                'slug' => 'update-role',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Delete Role',
                'slug' => 'delete-role',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Create Permission',
                'slug' => 'create-permission',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Read Permission',
                'slug' => 'read-permission',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Update Permission',
                'slug' => 'update-permission',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ],
            [
                'name' => 'Delete Permission',
                'slug' => 'delete-permission',
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString()
            ]
        ];
        Schema::disableForeignKeyConstraints();
        DB::table('admin_roles')->truncate();
        DB::table('admin_permissions')->truncate();
        DB::table('role_permissions')->truncate();
        AdminDetail::truncate();
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
        
        $countryId = Country::where('code','India')->first()->id;
        $stateId = State::where('country_id',$countryId)->inRandomOrder()->limit(1)->first()->id;
        $admin = Admin::find(1);
        $admin->roles()->attach([1]);
        AdminDetail::insert([
            'admin_id' => $admin->id,
            'url' => Str::slug($admin->name),
            'about' => Str::random(100),
            'avatar_id' => Media::inRandomOrder()->limit(1)->first()->id,
            'phone' => Str::random(10),
            'address' => Str::random(50),
            'country_id' => $countryId,
            'state_id' => $stateId,
            'city_id' => City::where('state_id',$stateId)->inRandomOrder()->limit(1)->first()->id,
            'zip' => Str::random(6),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);

        $stateId = State::where('country_id',$countryId)->inRandomOrder()->limit(1)->first()->id;
        $admin = Admin::find(2);
        $admin->roles()->attach([2]);
        AdminDetail::insert([
            'admin_id' => $admin->id,
            'url' => Str::slug($admin->name),
            'about' => Str::random(100),
            'avatar_id' => Media::inRandomOrder()->limit(1)->first()->id,
            'phone' => Str::random(10),
            'address' => Str::random(50),
            'country_id' => $countryId,
            'state_id' => $stateId,
            'city_id' => City::where('state_id',$stateId)->inRandomOrder()->limit(1)->first()->id,
            'zip' => Str::random(6),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);
        
        $stateId = State::where('country_id',$countryId)->inRandomOrder()->limit(1)->first()->id;
        $admin = Admin::find(3);
        $admin->roles()->attach([3]);
        AdminDetail::insert([
            'admin_id' => $admin->id,
            'url' => Str::slug($admin->name),
            'about' => Str::random(100),
            'avatar_id' => Media::inRandomOrder()->limit(1)->first()->id,
            'phone' => Str::random(10),
            'address' => Str::random(50),
            'country_id' => $countryId,
            'state_id' => $stateId,
            'city_id' => City::where('state_id',$stateId)->inRandomOrder()->limit(1)->first()->id,
            'zip' => Str::random(6),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);

        $stateId = State::where('country_id',$countryId)->inRandomOrder()->limit(1)->first()->id;
        $admin = Admin::find(4);
        $admin->roles()->attach([4]);
        AdminDetail::insert([
            'admin_id' => $admin->id,
            'url' => Str::slug($admin->name),
            'about' => Str::random(100),
            'avatar_id' => Media::inRandomOrder()->limit(1)->first()->id,
            'phone' => Str::random(10),
            'address' => Str::random(50),
            'country_id' => $countryId,
            'state_id' => $stateId,
            'city_id' => City::where('state_id',$stateId)->inRandomOrder()->limit(1)->first()->id,
            'zip' => Str::random(6),
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString()
        ]);

    }
}
