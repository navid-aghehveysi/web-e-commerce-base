<?php

namespace App\Models;

use App\Traits\Model\Relation\ModuleRelations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    //
    use HasFactory, SoftDeletes;
    use ModuleRelations;
    protected $table = 'modules';

    protected $fillable = [
        'name_en',
        'name_fa',
        'icon',
        'order',
        'status',
        'description'
    ];
}
