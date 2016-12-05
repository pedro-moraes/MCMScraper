<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishLists extends Model
{
    protected $table = 'wishlists';

    public static $rules = [
        'users' => 'required',
        'wishlisttype_id' => 'numeric|required',
        'wishlist_resource_id' => 'numeric|required'
    ];
}
