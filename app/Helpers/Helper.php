<?php
namespace App\Helpers;
use Illuminate\Http\Request;

use App\Models\User;
class Helper{

    public static function get_user_by_id($id){
       if(is_numeric($id)){
        $user= User::find($id);
        return $user;
       }
       else{
        Echo 'The user ID must be numeric';
       }
    }
    
 
}

?>