<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{
    //




		public function store(Request $request)
		{


            $validator = \Validator::make($request->all(),  [
                'name'=>'required',
                'email'=>'required|unique:users',
                'password'=>'required|min:6'
            ]);



            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }


            else {
                $name = $request->input('name');
                $email = $request->input('email');
                $password = $request->input('password');
                //$token=$request->input('_token');
                $token = sha1(time());

                $res = DB::insert('insert into  users(name,email,password,token) VALUES(?,?,?,?)', [$name, $email, $password, $token]);

                if ($res > 0) {

                   return response()->json($request->input(), 200);
                }

            }
		}


		public  function logs(Request $request)
        {


            $validator = \Validator::make($request->all(),  [
                'email'=>'required',
                'password'=>'required'
            ]);



            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }




               else
               {

                   $email=$request->input('email');
                   $password=$request->input('password');

                   $data= DB::select('select * from users where email=? and password=?',[$email,$password]);

                   if(count($data))
                   {
                       return response()->json($data, 200);
                   }

                   else
                   {
                       return response()->json("Password Or Email WRONG", 422);
                   }

               }







        }


}
