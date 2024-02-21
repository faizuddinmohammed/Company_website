<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorksCategory extends Model
{
    // protected $table = 'works_categories';
    // protected $fillable = ['name','status','lang'];
    protected $table = 'solution_categories';
    protected $fillable = ['name','status','lang','icon_type','icon','img_icon'];
}
