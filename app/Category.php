<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name'];


    /**
     * Mutator to convert all categories name to lower
     * case before save to resource
     * @param $value
     */
    public function setNameAttribute($value){
        $this->attributes['name'] = strtolower($value);
    }

    /**
     * Convert category name to uppercase
     * @param $value
     * @return string
     */
    public function getNameAttribute($value){
        return ucfirst($value);
    }
}
