<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Helpers\Helper;

class UserController extends Controller
{
    
    public function userPage($id){
      
      $user= Helper::get_user_by_id($id);
      if(!$user){
        echo "No such user exist ($id)";
      }
      else{
        return view('Pages.userpage', compact('user'));
      } 
    }
    
    public function userPost(Request $request){
      
      $data=request()->validate([
        'id'=>'required|Numeric',
        'comments'=>'required|String',
        'password'=>'required|string'
      ]);
      
      if(strtoupper($request->password) !=='720DF6C2482218518FA20FDC52D4DED7ECC043AB')
       return response()->json('Invalid Password', 401); 

        $id=$request->id;
        $user = User::find($id);
        if($user){
          
          $user->comments .= $request->comments.PHP_EOL;
          $user->save();
          return response()->json('OK');
        }
        else{
          return response()->json("no such user (2)", 404);
        }
      
      

      
     
      
    }
}
