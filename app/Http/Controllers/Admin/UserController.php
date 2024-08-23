<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('id_role', '2')->get();
        return view('admin.pages.data-user', [
            'user' => $user
        ]);
    }
}
