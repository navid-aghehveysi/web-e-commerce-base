<?php

namespace App\Actions\Panel\SubmoduleItem\Commands;

use App\Models\SubmoduleItem;
use App\Repositories\Eloquent\SubmoduleItem\SubmoduleItemWriteRepository;

class ChangeStatusSubmoduleItemCommand
{
    public function __construct(protected SubmoduleItemWriteRepository $repository){}

    public function __invoke(SubmoduleItem $submoduleItem)
    {
        return $this->repository->status($submoduleItem);
    }
}
