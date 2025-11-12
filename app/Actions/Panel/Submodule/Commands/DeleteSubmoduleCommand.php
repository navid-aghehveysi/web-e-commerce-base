<?php

namespace App\Actions\Panel\Submodule\Commands;

use App\Models\Submodule;
use App\Repositories\Eloquent\Submodule\SubmoduleWriteRepository;

class DeleteSubmoduleCommand
{
    public function __construct(protected SubmoduleWriteRepository $repository){}
    public function __invoke(Submodule $submodule)
    {
        $this->repository->destroy($submodule);
    }
}
