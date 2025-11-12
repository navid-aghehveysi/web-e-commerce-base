<?php

namespace App\Repositories\Eloquent\User;

use App\Models\User;
use App\Repositories\Eloquent\ReadOnlyRepository;

class UserReadOnlyRepository extends ReadOnlyRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}
