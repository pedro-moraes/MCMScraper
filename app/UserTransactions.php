<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTransactions extends Model
{
    protected $table = 'usertransactions';

    public static $rules = [
        'articles' => 'required|numeric',
        'sales' => 'numeric|required',
        'created_at' => 'required|date'
    ];

}
