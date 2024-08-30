<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected UserService $userService){}

    public function store(Request $request)
    {
        $user = $this->userService->registerUser($request->all());
        return response()->json($user, 201);
    }
}
