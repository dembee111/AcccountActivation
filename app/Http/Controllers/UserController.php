<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::all();

    	return view('users.index', compact('users'));
    }

    public function activeAccount($id)
    {
         $user = User::find($id);
         if ($user->active == 1) {
	         	$user->update([
	            	'active' => 0
	         	]);
         }else{
         	    $user->update([
	            'active' => 1
	        ]);
         }
     

         
         return redirect('/users')->with('status', 'Амжилттай засагдлаа');
         //
    }
}
