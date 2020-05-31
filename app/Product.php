<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [ 'name', 'price', 'category_id', 'thumbnail', 'description'];


    /**
     * One to one relationship with category resource
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo('App\Category');
    }

    /**
     * One to many relationship with photo resource
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photo(){
        return $this->hasOne('App\Photo');
    }


}
