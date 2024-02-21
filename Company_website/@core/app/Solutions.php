<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solutions extends Model
{
    protected $table = 'solutions';

    protected $fillable = ['title','meta_tag','icon_type','img_icon','sr_order','meta_description','status','slug','lang','icon','image','banner','description','categories_id','excerpt','price_plan','description2','excerpt2','more_service_title','more_service_img'];

    public function category(){
        return $this->belongsTo('App\SolutionsCategory','categories_id');
    }
}
