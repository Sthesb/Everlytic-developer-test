<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserListing extends Model
{
    protected $fillable = [
        'name' ,'surname','email','position',
    ];
}
