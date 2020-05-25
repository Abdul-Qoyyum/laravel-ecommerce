<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = ['name'];

    /**
     * Transform role name to uppercase
     * @param $value
     * @return string
     */
    public function getNameAttribute($value){
        return ucfirst($value);
    }
}
