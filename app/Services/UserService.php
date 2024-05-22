<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function register($request) {
        $request->validate([
            'username' => ['required', 'unique:users'],
            'firstName' => ['required'],
            'lastName' => ['required'],
            'password' => ['required', 'min:6', 'confirmed']
        ]);
        $response = $this->repository->register($request);
        return $response;
    }

    public function login($request) {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
        $response = $this->repository->login($credentials);
        return $response;
    }

    public function logout() {
        return $this->repository->logout();
    }
}