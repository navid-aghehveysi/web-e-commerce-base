<?php

namespace App\Repositories\Eloquent\Module;

use App\Models\Module;
use App\Repositories\Eloquent\ReadOnlyRepository;
use Illuminate\Database\Eloquent\Model;

class ModuleReadOnlyRepository extends ReadOnlyRepository
{

    public function __construct(Module $module)
    {
        parent::__construct($module);
    }
}
