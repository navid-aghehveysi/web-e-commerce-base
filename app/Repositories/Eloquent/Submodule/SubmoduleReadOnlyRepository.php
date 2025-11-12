<?php

namespace App\Repositories\Eloquent\Submodule;

use App\Models\Submodule;
use App\Repositories\Eloquent\ReadOnlyRepository;

class SubmoduleReadOnlyRepository extends ReadOnlyRepository
{
    public function __construct(Submodule $submodule)
    {
        parent::__construct($submodule);
    }
}
