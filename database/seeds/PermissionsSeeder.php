<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'module' 		=> 'users',
            'status' 		=> 1,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

        DB::table('permissions')->insert([
            'module' 		=> 'roles',
            'status' 		=> 1,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

        DB::table('permissions')->insert([
            'module' 		=> 'tasks',
            'status' 		=> 1,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

        DB::table('permissions')->insert([
            'module' 		=> 'tasks-types',
            'status' 		=> 1,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

    }
}
