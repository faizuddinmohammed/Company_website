<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Works extends Model
{
    // // protected $table = 'works';
    // protected $table = 'solutions';
    // protected $fillable = [
    //     'title',
    //     'gallery',
    //     'status',
    //     'lang',
    //     'categories_id',
    //     'slug',
    //     'excerpt',
    //     'meta_tag',
    //     'meta_description',
    //     'duration',
    //     'clients',
    //     'budget',
    //     'description',
    //     'gallery',
    //     'image'
    // ];
    protected $table = 'solutions';

    protected $fillable = ['title','meta_tag','icon_type','img_icon','sr_order','meta_description','status','slug','lang','icon','image','banner','description','categories_id','excerpt','price_plan','description2','excerpt2','more_service_title','more_service_img','text1','text2'];

    public function category(){
        return $this->belongsTo('App\WorksCategory','categories_id');
    }

    // public function getCategoriesIdAttribute($value){
    //     return unserialize($value);
    // }

}
