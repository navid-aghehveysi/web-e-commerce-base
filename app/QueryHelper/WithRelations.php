<?php

namespace App\QueryHelper;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class WithRelations
{

    public function __construct(protected array $defaultRelation = ['user']){}

    /**
     * @param Builder|Model $queryOrObject
     * @param array|null $relations
     * @return Builder|Model
     */
    public function __invoke(Builder|Model $queryOrObject , ?array $relations = null): Builder|Model
    {
        $relations = $relations ?? $this->defaultRelation;

        return $queryOrObject instanceof Builder
            ? $queryOrObject->with($relations)
            : $queryOrObject->load($relations);
    }
}
