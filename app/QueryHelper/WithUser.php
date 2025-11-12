<?php

namespace App\QueryHelper;



use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class WithUser
{

    public function __construct(protected string $defaultRelation = 'user'){}

    /**
     * @param Builder|Model $queryOrObject
     * @param string|null $relation
     * @return Builder|Model
     */
    public function __invoke(Builder|Model $queryOrObject , ?string $relation = null): Builder|Model
    {
        $relation = $relation ?? $this->defaultRelation;
        return $queryOrObject instanceof Builder
                ? $queryOrObject->with($relation)
                : $queryOrObject->load($relation);
    }
}
