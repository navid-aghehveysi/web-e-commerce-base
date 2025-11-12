<?php

namespace App\Repositories\Eloquent\SubmoduleItem;

use App\Models\SubmoduleItem;
use App\Repositories\Eloquent\WriteRepository;

class SubmoduleItemWriteRepository extends WriteRepository
{
    public function __construct(SubmoduleItem $submoduleItem)
    {
        parent::__construct($submoduleItem);
    }
}
