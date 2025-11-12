<?php

namespace App\Repositories\Eloquent\User;

use App\Models\User;
use App\Repositories\Eloquent\WriteRepository;

class UserWriteRepository extends WriteRepository
{

    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}
