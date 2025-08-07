<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $users =   User::with(['phone', 'image'])->paginate(10);

        return view('user', ['users' => $users]);
    }
}
