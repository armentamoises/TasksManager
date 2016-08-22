<?php

use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'name'          => 'My Project',
            'logo' 	        => 'project.jpg',
            'status' 		=> 1,
            'created_at'    => date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);
    }
}
