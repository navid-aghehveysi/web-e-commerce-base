<?php

namespace App\Repositories\Eloquent\SubmoduleItem;

use App\Models\SubmoduleItem;
use App\Repositories\Eloquent\ReadOnlyRepository;

class SubmoduleItemReadOnlyRepository extends ReadOnlyRepository
{
    public function __construct(SubmoduleItem $submoduleItem)
    {
        parent::__construct($submoduleItem);
    }
}
