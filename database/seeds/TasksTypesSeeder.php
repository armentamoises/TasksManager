<?php

use Illuminate\Database\Seeder;

class TasksTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks_types')->insert([
            'name' 			=> 'Implementation',
            'status' 		=> 1,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_types')->insert([
            'name'          => 'Modification',
            'status'        => 1,
            'created_at'    => date('Y-m-d h:i:s'),
            'updated_at'    => date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_types')->insert([
            'name'          => 'Termination',
            'status'        => 1,
            'created_at'    => date('Y-m-d h:i:s'),
            'updated_at'    => date('Y-m-d h:i:s'),
        ]);
    }
}
