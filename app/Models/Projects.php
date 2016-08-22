<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Projects extends Model{
	
	protected $table = 'projects';
	
	protected $fillable = array(
				"name",
				"logo",
				"status",
				"created_at",
				"updated_at"
	);
	
	//public $timestamps = false;

	
}

?>