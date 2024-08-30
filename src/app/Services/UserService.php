<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    public function __construct(protected UserRepository $userRepository){}

    public function registerUser(array $data)
    {
        // Validate, sanitize, send welcome email, etc.
        $user = $this->userRepository->create($data);
        return $user;
    }
}
