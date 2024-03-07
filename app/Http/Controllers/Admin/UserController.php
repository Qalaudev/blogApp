<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){
        $users = null;
        if($request->search){
            $users = User::where('name', 'LIKE', '%'.$request->search.'%')
                ->orWhere('email','LIKE','%'.$request->search.'%')
                ->with('role')->get();
        }else{
            $users = User::with('role')->get();
        }
        return view('admin.users',['users'=>$users]);
    }

    public function editRole(User $user){
        return view('admin.edit',['user'=>$user,'role'=>Role::all()]);
    }

    public function updateRole(Request $request, User $user){
        $user->update([
            'role_id' => $request->role_id
        ]);
        return redirect()->route('adm.management.users');
    }

    public function isActive(User $user){
        $user->update([
           'is_active' => false,
        ]);
        return back();
    }

    public function isDeactive(User $user){
        $user->update([
            'is_active' => true,
        ]);
        return back();
    }

}
