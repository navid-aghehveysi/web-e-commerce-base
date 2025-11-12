<?php

namespace App\Models;

use App\Traits\Model\Relation\SubmoduleRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submodule extends Model
{
    use HasFactory, SoftDeletes;
    use SubmoduleRelations;
    protected $table = 'submodules';
    protected $fillable = [
        'module_id',
        'name_en',
        'name_fa',
        'icon',
        'route',
        'order',
        'description',
        'status',
    ];
}
