<?php

namespace App\Actions\Panel\SubmoduleItem\Queries;

use App\Repositories\Eloquent\SubmoduleItem\SubmoduleItemReadOnlyRepository;

class FetchAllSubmoduleItemsQuery
{
    public function __construct(protected SubmoduleItemReadOnlyRepository $repository){}

    public function __invoke()
    {
        return $this->repository->query();
    }
}
