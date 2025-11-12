<?php

namespace App\Actions\Panel\Module\Commands;

use App\Models\Module;
use App\Repositories\Eloquent\Module\ModuleWriteRepository;

class ChangeStatusModuleCommand
{
    public function __construct(protected ModuleWriteRepository $repository){}

    public function __invoke(Module $module)
    {
        return $this->repository->status($module);
    }
}
