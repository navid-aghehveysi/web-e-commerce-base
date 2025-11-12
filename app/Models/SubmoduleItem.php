<?php

namespace App\Models;

use App\Traits\Model\Relation\SubmoduleItemRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubmoduleItem extends Model
{
    use HasFactory, SoftDeletes;
    use SubmoduleItemRelations;
    protected $table = 'submodule_items';
    protected $fillable = [
        'submodule_id',
        'name_en',
        'name_fa',
        'icon',
        'route',
        'order',
        'description',
        'status'
    ];
}
