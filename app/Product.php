<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [ 'name', 'price', 'category_id', 'thumbnail', 'description', ];


    /**
     * Returns one to one relationship between
     * products and categories
     */
    public function category(){
        return $this->belongsTo('App\Category');
    }

}
