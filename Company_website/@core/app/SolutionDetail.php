<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SolutionDetail extends Model
{
    protected $table = 'solution_details';

    protected $fillable = [ 'service_id', 'title', 'description', 'content','img' ];
    public function service(){
        return $this->belongsTo('App\Solution','service_id');
    }
}
