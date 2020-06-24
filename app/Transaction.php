<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * attributes that are mas assignable
     * @var array
     */
    protected $fillable = [
        'user_id','txn_id','delivery_status'
    ];

}
