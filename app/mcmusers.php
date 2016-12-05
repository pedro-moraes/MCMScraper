<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mcmusers extends Model
{
    protected $table = 'mcmusers';

    public static $rules = [
        'username' => 'required|min:1|max:255',
        'mcmid' => 'numeric|required'
    ];

}
