<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;

use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use Sluggable;

    use SluggableScopeHelpers;


    /**
     * properties that are mass assignable
     * @var array
     */
    protected $fillable = [ 'name', 'price', 'category_id', 'thumbnail', 'description'];

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
