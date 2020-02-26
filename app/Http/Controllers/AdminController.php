<?php

namespace App\Http\Controllers;

use App\User;
use App\Roles;

use Illuminate\Http\Request;

class AdminController extends Controller
{
  public function index()
  {
    return view('admin.index');
  }

  public function users()
  {
    $roles = Roles::all();
    $users = User::all();

    return view('admin.users', compact('users', 'roles'));
  }

  public function userUpdate(Request $request, $userId)
  {

    $user = User::find($userId);
    $user->role_id = $request->userRole;
    $user->save();

    return back();
  }
}
