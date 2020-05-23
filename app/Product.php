<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [ 'name', 'price', 'category_id', 'thumbnail', 'description', ];

    /*
     * Image directory with respect to the
     * public folder
     */
//    protected $directory = '/img/products/';


    /**
     * Returns one to one relationship between
     * products and categories
     */
    public function category(){
        return $this->belongsTo('App\Category');
    }

//    /**
//     * Accessor to change the thumbnail path
//     */
//    public function getThumbnailAttribute($value){
//        return base_path() .'/public/'. $value;
//    }
}
