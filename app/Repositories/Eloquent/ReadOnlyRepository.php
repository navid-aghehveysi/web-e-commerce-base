<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\ReadOnlyRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class ReadOnlyRepository implements ReadOnlyRepositoryInterface
{

    public function __construct(protected Model $model){}

    public function query(): Builder
    {
        return $this->model->newQuery();
    }

    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function all(): Collection
    {
        return $this->model->latest()->get();
    }
    public function fetch(Model $model): Model
    {
        return $this->model->where('id', $model->id)->first();
    }
}
