<?php

namespace App\Http\Controllers;

use App\UserTransactions;
use Illuminate\Http\Request;

class UserTransactionsController extends Controller
{
    public function add(Request $request){

        //foreach item traverse json and call validation saving data
        foreach($request as $item) {

            try {

                $this->validate($item, UserTransactions::$rules);

                $usertransaction= new UserTransactions;
                $usertransaction->articles=$item->articles;
                $usertransaction->sales=$item->sales;
                $usertransaction->mcmid=$item->mcmid;
                $usertransaction->created_at=$item->created_at;
                $usertransaction->updated_at=$item->updated_at;

                $usertransaction->save();

            }catch(Exception $e){
                //log error??
                continue;
            }
        }

    }
}
