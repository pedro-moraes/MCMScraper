<?php

namespace App\Http\Controllers;

use App\mcmusers;
use Illuminate\Http\Request;
use League\Flysystem\Exception;

class McmUsersController extends Controller
{
    public function createOrUpdate(Request $request){

        //foreach item traverse json and call validation saving data
        foreach($request as $item) {

            try {

                $this->validate($item, mcmusers::$rules);

                mcmusers::updateOrCreate(
                    ['username' => $item->username, 'mcmid' => $item->mcmid],
                    ['active' => 1, 'created_at'=>$item->created_at, 'updated_at' => $item->updated_at]);


            }catch(Exception $e){
                //log error??
                continue;
            }
        }

    }

    public function get(){


    }
}

