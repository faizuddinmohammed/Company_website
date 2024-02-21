<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    protected $table = 'service_details';

    protected $fillable = [ 'service_id', 'title', 'description', 'content','img' ];
    public function service(){
        return $this->belongsTo('App\Service','service_id');
    }
}
