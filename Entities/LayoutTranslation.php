<?php

namespace Modules\Ibuilder\Entities;

use Illuminate\Database\Eloquent\Model;

class LayoutTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title'];
    protected $table = 'ibuilder__layout_translations';
}
