<?php

namespace App\Actions\User\Queries;

use App\Repositories\Eloquent\User\UserReadOnlyRepository;

class FetchUserQuery
{
    public function __construct(protected UserReadOnlyRepository $repository){}

    public function __invoke()
    {
        return $this->repository->query();
    }

}
