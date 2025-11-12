<?php

namespace App\Traits\Model\Relation;

use App\Models\Submodule;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait SubmoduleItemRelations
{
    public function submodule(): BelongsTo
    {
        return $this->belongsto(Submodule::class, 'submodule_id');
    }
}
