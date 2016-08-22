<?php

use Illuminate\Database\Seeder;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_permissions')->insert([
            'role_id' 		=> 1,
            'permission_id' => 1,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

        DB::table('role_permissions')->insert([
            'role_id' 		=> 1,
            'permission_id' => 2,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

        DB::table('role_permissions')->insert([
            'role_id' 		=> 1,
            'permission_id' => 3,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

        DB::table('role_permissions')->insert([
            'role_id' 		=> 1,
            'permission_id' => 4,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

        DB::table('role_permissions')->insert([
            'role_id' 		=> 2,
            'permission_id' => 3,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

        DB::table('role_permissions')->insert([
            'role_id' 		=> 2,
            'permission_id' => 4,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

        DB::table('role_permissions')->insert([
            'role_id' 		=> 3,
            'permission_id' => 3,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

        DB::table('role_permissions')->insert([
            'role_id' 		=> 4,
            'permission_id' => 3,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

        DB::table('role_permissions')->insert([
            'role_id' 		=> 5,
            'permission_id' => 3,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

        
    }
}
