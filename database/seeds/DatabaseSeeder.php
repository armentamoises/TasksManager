<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsersSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(ProjectsSeeder::class);
        $this->call(TasksTypesSeeder::class);
        $this->call(TasksStatusesSeeder::class);
        $this->call(TasksPermissionsSeeder::class);
        $this->call(RolePermissionsSeeder::class);
        $this->call(PermissionsSeeder::class);

        Model::reguard();
    }
}
