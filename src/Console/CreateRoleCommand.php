<?php

namespace Isifnet\PieAdmin\Console;

use Illuminate\Console\Command;

class CreateRoleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create-role';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a admin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $roleModel = config('admin.database.roles_model');

        $name = $this->ask('Please enter a name to display');

        $slug = $this->ask('Please enter a slug for url');

        $permissions = $this->ask('Please enter permissions for role');

        $permissions = explode(',', $permissions);

        $role = new $roleModel(compact('name', 'slug'));

        $role->save();

        $role->permissions()->attach($permissions);

        $this->info("Role [$name] created successfully.");
    }
}
