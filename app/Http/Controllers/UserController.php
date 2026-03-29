<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
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

    User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => bcrypt($request['password']),
    ]);

    return redirect('/')->with('success', 'User registered!');
}

public function login(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (auth()->attempt([
        'email' => $request['email'],
        'password' => $request['password']
    ])) {
        return redirect('/dashboard');
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
}

public function logout(Request $request){
    auth()->logout();
    return redirect('/login');
}

public function users(){
    $users = User::all();
    return view('users', ['users' => $users]);
}

public function deleteUser($id){
    if (!auth()->user()->hasPermissionTo('delete-users')) {
        return redirect('/users')->with('error', 'You do not have permission to delete users.');
    }
    
    $user = User::find($id);
    if ($user && $user->id !== auth()->user()->id) {
        $user->delete();
    }
    return redirect('/users');
}

public function editUser($id){
    if (!auth()->user()->hasPermissionTo('edit-users')) {
        return redirect('/users')->with('error', 'You do not have permission to edit users.');
    }
    
    $user = User::find($id);
    if (!$user || $user->id === auth()->user()->id) {
        return redirect('/users');
    }
    return view('edit-user', ['user' => $user]);
}

public function updateUser(Request $request, $id){
    if (!auth()->user()->hasPermissionTo('update-users')) {
        return redirect('/users')->with('error', 'You do not have permission to update users.');
    }
    
    $user = User::find($id);
    if (!$user || $user->id === auth()->user()->id) {
        return redirect('/users');
    }

    $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
        'password' => 'nullable|min:8',
    ]);

    $user->name = $request['name'];
    $user->email = $request['email'];
    
    if ($request['password']) {
        $user->password = bcrypt($request['password']);
    }
    
    $user->save();

    return redirect('/users')->with('success', 'User updated successfully!');
}

    
}
