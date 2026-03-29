<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function index(){
        $users = Register::all();
        return view('register.index', ['users' => $users]);
    }
    public function create()
    {
        return view('register.create');
    }
    public function store(Request $request){
        /*$incomingField = $request->validate([
            'name' => ['required','string','max:20'],
            'email'=> ['required','email'],
            'password'=> ['required','min:8'],
        ]);
    */
    
        $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
     
            ]);
    
        Register::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
    
        return redirect('/')->with('success', 'User registered!');
    }


    public function edit(Register $register){
        return view('register.edit', ['register' => $register]);
    }

    public function update(Register $register , Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
 
        ]);

        $register->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        
        return redirect()->route('register.index')->with('success', 'User updated successfully');
    }

    public function delete(Register $register){
        $register->delete();
        return redirect()->route('register.index')->with('success', 'User deleted successfully');
    }
}
