<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ReadOnlyRepositoryInterface
{
    public function query(): Builder;
    public function find($id): ?Model;
    public function all(): Collection;
    public function fetch(Model $model): Model;
}
