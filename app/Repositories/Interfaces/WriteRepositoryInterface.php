<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface WriteRepositoryInterface
{
    public function create(array $data): ?Model;
    public function update(array $data, Model $model): bool;
    public function destroy(Model $model): bool;
    public function status(Model $model): bool;


    public function query(): Builder;

    public function where(Builder $query ,array $conditions = []): Builder;
}
