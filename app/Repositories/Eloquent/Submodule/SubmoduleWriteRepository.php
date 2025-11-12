<?php

namespace App\Repositories\Eloquent\Submodule;

use App\Models\Submodule;
use App\Repositories\Eloquent\WriteRepository;

class SubmoduleWriteRepository extends WriteRepository
{
    public function __construct(Submodule $submodule)
    {
        parent::__construct($submodule);
    }
}
