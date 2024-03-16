<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{


      public function registerUser(){
        return view('register-user');
      }

     public function login(Request $request){
          $incomingFields = $request->validate([
            'login_name' => 'required',
            'login_password' => 'required'
          ]);

           if(auth()->attempt(['name' => $incomingFields['login_name'], 'password' => $incomingFields['login_password']])){
             $request->session()->regenerate();     //i think create session and do login. 

           }
     
           return redirect('/');

     }



     public function logout(){
        auth()->logout();           //it create a session and have method like login, logout
        return redirect('/');
     }
     

    public function register(Request $request){
        $incomingFields = $request->validate([
           'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
           'email' => ['required', 'email', Rule::unique('users', 'email')],
           'password' => ['required', 'min:8', "max:200"]
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);  // for passw encryptin
         $user = User::create($incomingFields);   //storing data in db.  this is a model used for mapping sata. ths user on e is default.
         // auth()->login($user);   //this line redirect me to the notes page.


          return redirect('/');
    }
}
