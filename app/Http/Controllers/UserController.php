<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Helper\JWTToken;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userlogin(Request $request){
      try{
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' =>$request->input('password') 
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'User Registration Successfully'
        ],200);
      }catch(Exception $e){
        return response()->json([
            'status' => 'error',
            'message' => 'User Registration Failed'
        ],400);
      }
    }

    public function usersignin(Request $request){
               
        $count = User::where('email','=',$request->input('email'))
        ->where('password','=',$request->input('password'))
        ->select('id')->first();

        if($count!==null){    
          $token = JWTToken::CreateToken($request->input('email'),$count->id);
          return response()->json([
              'status' => 'success',
              'message' => 'User Login Successful',
              'token' => $token,
              'data'=>$count->id
          ],200)->cookie('token',$token,time()+60*24*30);
      }
      else{
          return response()->json([
              'status' => 'failed',
              'message' => 'unauthorized1'
          ],200);

      }
        
      }


   public  function UserLogout(){
        return redirect('/')->cookie('token','',-1);
    }
    public function accountpage(){
         return view("pages.account");
}

    public function userprofilelist(Request $request){
        $user_id = $request->header('id');
        $data = User::where('id','=',$user_id)->first();
        return response()->json([
            'status' => 'success',
            'message' => 'User Profile Fetched',
            'data' => $data
        ],200);
           
    }
    function UpdateUserProfile(Request $request){
        try{
            $id=$request->header('id');
            $name=$request->input('name');
            $mobile=$request->input('mobile');
            $designation=$request->input('designation');
         
            User::where('id','=',$id)->update([
                'name'=>$name,
                'designation'=>$designation,
                'mobile'=>$mobile,
               
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Request Successful',
            ],200);

        }catch (Exception $exception){
            return response()->json([
                'status' => 'fail',
                'message' => 'Something Went Wrong',
            ],200);
        }
    }
    public function profilephoto(Request $request){
        try {
            // Validate request
            $user_id = $request->header('id');
            
            // Prepare File Name & Path
            $img = $request->file('img');
            $t = time();
            $file_name = $img->getClientOriginalName();
            $img_name = "{$user_id}-{$t}-{$file_name}";
            $img_url = "uploads/{$img_name}";
    
            // Upload File
            $img->move(public_path('uploads'), $img_name);
    
            // Save To Database
            User::where('id', $user_id)->update([
                'image' => $img_url,
            ]);
    
            return response()->json([
                'status' => 'success',
                'message' => 'Photo Update Successfully',
            ], 200);
        } catch (Exception $e) {
            // Handle any exceptions
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage(),
            ], 500); // Return a 500 status code for server errors
        }
    }
    
  
}
