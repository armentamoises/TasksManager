<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' 			=> 'IT Chief',
            'description' 	=> 'This user is the IT Deparment Director',
            'status' 		=> 1,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

        DB::table('roles')->insert([
            'name' 			=> 'Lead Project',
            'description' 	=> "This user leads specific projects under the chief's orders",
            'status' 		=> 1,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

        DB::table('roles')->insert([
            'name' 			=> 'Supervisor',
            'description' 	=> "This user supervises a task assigned to a developer",
            'status' 		=> 1,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

        DB::table('roles')->insert([
            'name' 			=> 'Developer',
            'description' 	=> "This user develops modules for the system",
            'status' 		=> 1,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

        DB::table('roles')->insert([
            'name' 			=> 'Sales',
            'description' 	=> "This user can request tasks to the IT Department",
            'status' 		=> 1,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

    }
}
