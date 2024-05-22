<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function register(Request $request) {
        return $this->service->register($request);
    }

    public function login (Request $request) {
        return $this->service->login($request);
    }

    public function logout () {
        return $this->service->logout();
    }
}
