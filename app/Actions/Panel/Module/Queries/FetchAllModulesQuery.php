<?php

namespace App\Actions\Panel\Module\Queries;

use App\Repositories\Eloquent\Module\ModuleReadOnlyRepository;

class FetchAllModulesQuery
{
    public function __construct(
        public ModuleReadOnlyRepository $repository
    ){}

    public function __invoke()
    {
        return $this->repository->query();
    }
}
