<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardPrices extends Model
{
    protected $table = 'cardprices';

    public static $rules = [
        'card_id' => 'required|numeric',
        'expansion_id' => 'numeric|required',
        'mcmuser_id' => 'numeric|required'
    ];
}
