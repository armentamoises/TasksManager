<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class TasksStatuses extends Model{
	
	protected $table = 'tasks_statuses';
	
	protected $fillable = array(
				"name",
				"description",
				"status",
				"created_at",
				"updated_at"
	);
	

	

	
}

?>