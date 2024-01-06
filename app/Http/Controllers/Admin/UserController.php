<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('admin.users.all-users', ['users' => $users]);
    }

    public function deleteUser($id)
    {
        User::find($id)->delete();
        return redirect('/admin-dashboard/users');
    }
}
