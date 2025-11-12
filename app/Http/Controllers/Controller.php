<?php

namespace App\Http\Controllers;

use App\Traits\Api\Responses\ApiResponse;
use App\Traits\Controller\RedirectWithMessage;
use App\Traits\logging\loggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller
{
    //
    use loggable;
    use ApiResponse;
    use RedirectWithMessage;
    use AuthorizesRequests;

    public function withRelations(Builder|Model $queryOrObject, ?array $relations = null): Model|Builder
    {
        return ($this->withRelations)($queryOrObject, $relations);
    }
}
