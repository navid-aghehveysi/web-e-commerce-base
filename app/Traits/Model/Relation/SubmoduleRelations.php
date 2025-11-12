<?php

namespace App\Traits\Model\Relation;

use App\Models\Module;
use App\Models\Submodule;
use App\Models\SubmoduleItem;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PhpParser\Builder\Class_;

trait SubmoduleRelations
{
    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class, 'module_id');
    }


    public function submoduleItems(): HasMany
    {
        return $this->hasMany(SubmoduleItem::class, 'submodule_id');
    }
}
