<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index(){
        $users = User::with('role')->get();
        $roles = Role::all();

        return view('users.index', compact('users', 'roles'));
    }

    public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->id_rol = $request->id_rol;
        
        $user->save();

        return redirect()->route('users.index');
    }

    public function edit(string $id){
        $user = User::find($id);
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->id_rol = $request->id_rol;
        
        $user->save();

        return redirect()->route('users.index');
    }

    public function destroy($id){
        $user = User::find($id);

        $user->delete();

        return redirect()->route('users.index');
    }
}
