<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Validator;
use DB;


class RolePermissions extends Model{
	
	protected $table = 'role_permissions';
	
    protected $fillable = array(
      	"role_id",
      	"permission_id"
    );
	
    public static function insert($input){
        
        $new_role_permission = array();
        
        $rules     = array(
                        'role_id'         => 'required',
                        'permission_id'   => 'required'
                    );


        $validator  = Validator::make($input, $rules);

        if ($validator->fails()){
            $new_role_permission['mensaje']  = "Data not saved";
            $new_role_permission['error']    = true;
            $new_role_permission['id']       = '';
        }else{
            $var                  = static::create($input);
            $new_role_permission['mensaje']  = 'Data saved!';
            $new_role_permission['error']    = false;
            $new_role_permission['id']       = $var['id'];
        }
        
        return $new_role_permission; 
    }

    public static function CheckPermission($role_id, $permission_id){

        $match = DB::table ('role_permissions')
                        ->select('role_permissions.role_id',
                                'role_permissions.permission_id')
                        ->where('role_permissions.role_id', '=', $role_id)
                        ->where('role_permissions.permission_id', '=', $permission_id)
                        ->get();
        
        if (count($match) == 0) {
            return false;
        }
        else{
            return true;
        }
    }
	
    

}
?>