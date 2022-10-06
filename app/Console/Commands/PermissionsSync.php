<?php

namespace App\Console\Commands;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Console\Command;

class PermissionsSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Permission in Database from Config File';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo "Permissions Syncing...\n";
        foreach (config('permissions') as $key => $value) {
            if(Permission::where('slug',$value)->count() == 0){
                Permission::create([
                    'name' => ucwords(str_replace("-"," ",$value)),
                    'slug' => $value,
                ]);
            }
        }
        Role::where('slug','super-admin')->first()->permissions()->sync(Permission::all()->pluck('id')->toArray());
        echo "Permissions Synced !\n";
    }
}
