<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        // dd($user);
        $roles = User::getRoles();
        return view('admin.users.edit',compact('user','roles'));
    }
}
