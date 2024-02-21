<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionCategory extends Model
{
    protected $table = 'solution_categories';
    protected $fillable = ['name','status','lang','icon_type','icon','img_icon'];
}
