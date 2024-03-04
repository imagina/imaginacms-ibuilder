<?php

namespace Modules\Ibuilder\Entities;

use Illuminate\Database\Eloquent\Model;

class BuildableTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'ibuilder__buildable_translations';
}
