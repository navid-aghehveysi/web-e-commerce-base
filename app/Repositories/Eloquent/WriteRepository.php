<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\WriteRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class WriteRepository implements WriteRepositoryInterface
{

    public function __construct(protected Model $model){}

    public function create(array $data): ?Model
    {
        return $this->model->create($data);
    }

    public function update(array $data, Model $model): bool
    {
        return $model->update($data);
    }

    public function destroy(Model $model): bool
    {
        return (bool) $model->delete();
    }

    public function status(Model $model): bool
    {
        $model->status = !$model->status;
        return $model->save();
    }

    public function query(): Builder
    {
        return $this->model->newQuery();
    }

    public function where(Builder $query, array $conditions = []): Builder
    {
        return $query->where($conditions);
    }
}
