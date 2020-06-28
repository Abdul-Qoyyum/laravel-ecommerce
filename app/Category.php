<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;

use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use Sluggable;

    use SluggableScopeHelpers;

    /**
     * properties that are mass assignable
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * One to many relationship with products resource
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(){
        return $this->hasMany('App\Product');
    }

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
