<?php

namespace App\Actions\Panel\Submodule\Commands;

use App\Models\Submodule;
use App\Repositories\Eloquent\Submodule\SubmoduleWriteRepository;

class ChangeStatusSubmoduleCommand
{
    public function __construct(protected SubmoduleWriteRepository $repository){}

    public function __invoke(Submodule $submodule)
    {
        return $this->repository->status($submodule);
    }
}
