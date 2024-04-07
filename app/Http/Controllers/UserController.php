<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Jobs\WelcomeEmailJob;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $user = [
            $request->input('name'),
            $request->input('email'),
            $request->input('password')
        ];
        $user = User::create($request->all());
        WelcomeEmailJob::dispatch($user);;
        return $user;
    }
}
