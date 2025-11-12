<?php

namespace App\Actions\Panel\Submodule\Queries;

use App\Repositories\Eloquent\Submodule\SubmoduleReadOnlyRepository;

class FetchAllSubmodulesQuery
{
    public function __construct(protected SubmoduleReadOnlyRepository $repository){}
    public function __invoke()
    {
        return $this->repository->query();
    }
}
