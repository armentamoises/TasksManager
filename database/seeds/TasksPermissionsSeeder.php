<?php

use Illuminate\Database\Seeder;

class TasksPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 1,
            'user_role_id'   	=> 0,
            'edit' 				=> 1,
            'delete' 			=> 1,
            'send' 				=> 1,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 2,
            'user_role_id'   	=> 0,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 3,
            'user_role_id'   	=> 0,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 4,
            'user_role_id'   	=> 0,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 5,
            'user_role_id'   	=> 0,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 6,
            'user_role_id'   	=> 0,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 7,
            'user_role_id'   	=> 0,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 1,
            'user_role_id'   	=> 1,
            'edit' 				=> 1,
            'delete' 			=> 1,
            'send' 				=> 1,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 2,
            'user_role_id'   	=> 1,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 3,
            'user_role_id'   	=> 1,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 1,
            'reject' 			=> 1,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 4,
            'user_role_id'   	=> 1,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 5,
            'user_role_id'   	=> 1,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 1,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 6,
            'user_role_id'   	=> 1,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 7,
            'user_role_id'   	=> 1,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 1,
            'user_role_id'   	=> 2,
            'edit' 				=> 1,
            'delete' 			=> 1,
            'send' 				=> 1,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 2,
            'user_role_id'   	=> 2,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 1,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 1,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 3,
            'user_role_id'   	=> 2,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 4,
            'user_role_id'   	=> 2,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 1,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 5,
            'user_role_id'   	=> 2,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 1,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 6,
            'user_role_id'   	=> 2,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 7,
            'user_role_id'   	=> 2,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 1,
            'user_role_id'   	=> 3,
            'edit' 				=> 1,
            'delete' 			=> 1,
            'send' 				=> 1,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 2,
            'user_role_id'   	=> 3,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 3,
            'user_role_id'   	=> 3,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 4,
            'user_role_id'   	=> 3,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 5,
            'user_role_id'   	=> 3,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 1,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 6,
            'user_role_id'   	=> 3,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);

        DB::table('tasks_permissions')->insert([
            'task_status_id' 	=> 7,
            'user_role_id'   	=> 3,
            'edit' 				=> 0,
            'delete' 			=> 0,
            'send' 				=> 0,
            'approve' 			=> 0,
            'assign' 			=> 0,
            'authorize' 		=> 0,
            'reject' 			=> 0,
            'complete' 			=> 0,
            'status' 			=> 1,
            'created_at' 		=> date('Y-m-d h:i:s'),
            'updated_at' 		=> date('Y-m-d h:i:s'),
        ]);
    }
}
