<?php

namespace App\Repositories\Eloquent\Module;

use App\Models\Module;
use App\Repositories\Eloquent\WriteRepository;

class ModuleWriteRepository extends WriteRepository
{

    public function __construct(Module $module)
    {
        parent::__construct($module);
    }
}
