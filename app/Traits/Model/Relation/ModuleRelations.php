<?php

namespace App\Traits\Model\Relation;

use App\Models\Submodule;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait ModuleRelations
{


    public function submodules(): HasMany
    {
        return $this->hasMany(Submodule::class, 'module_id');
    }
}
