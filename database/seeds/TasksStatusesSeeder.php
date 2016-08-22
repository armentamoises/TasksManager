<?php

use Illuminate\Database\Seeder;

class TasksStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks_statuses')->insert([
            'name' 			=> 'Request',
            'description'   => "The 'Request' status means the user created a request but he hasn't sent the request to be approved.",
            'status' 		=> 1,
            'created_at' 	=> date('Y-m-d h:i:s'),
            'updated_at' 	=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_statuses')->insert([
            'name'          => 'Sent',
            'description'   => "The 'Sent' status means the user sent the request to be approved.",
            'status'        => 1,
            'created_at'    => date('Y-m-d h:i:s'),
            'updated_at'    => date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_statuses')->insert([
            'name'          => 'Approved',
            'description'   => "The 'Approved' status means the request was approved by the lead project.",
            'status'        => 1,
            'created_at'    => date('Y-m-d h:i:s'),
            'updated_at'    => date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_statuses')->insert([
            'name'          => 'Authorized',
            'description'   => "The 'Authorized' status means the request was authorized by the chief department.",
            'status'        => 1,
            'created_at'    => date('Y-m-d h:i:s'),
            'updated_at'    => date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_statuses')->insert([
            'name'          => 'Assigned',
            'description'   => "The 'Assigned' status means the request was assigned by the chief department to a developer and a supervisor.",
            'status'        => 1,
            'created_at'    => date('Y-m-d h:i:s'),
            'updated_at'    => date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_statuses')->insert([
            'name'          => 'Completed',
            'description'   => "The 'Completed' status means the request was completed.",
            'status'        => 1,
            'created_at'    => date('Y-m-d h:i:s'),
            'updated_at'    => date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_statuses')->insert([
            'name'          => 'Rejected',
            'description'   => "The 'Rejected' status means the request was rejected.",
            'status'        => 1,
            'created_at'    => date('Y-m-d h:i:s'),
            'updated_at'    => date('Y-m-d h:i:s'),
        ]);

        //When a task is deleted (cancelled) by the requestor the status will be 0

        
    }
}
