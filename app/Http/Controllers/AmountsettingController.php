<?php

namespace App\Http\Controllers;

use App\Amountsetting;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Sentinel;

class AmountsettingController extends Controller
{
    //



    public function save(Request $request){


        $noSet = Amountsetting::where( 'platformId',$request->platformId);
       if($noSet->count() <= 3){
           $newAmount = Amountsetting::create([
               'platformId' =>$request->platformId, //from stripe
               'amount' => $request->amount
           ]);
           return redirect('profile/'.$request->platformId);
       }else{
           //with limits exceeded
           return redirect('profile/'.$request->platformId);
       }



    }

    public function updateamount(Request $request){

        $newAmount =Amountsetting::find($request->amount_id);
        $newAmount->amount = $request->amount;
        $newAmount->save();

        return redirect('profile/'.$request->platformId);
    }


    public function deleteamount(Request $request){

        Amountsetting::find($request->amount_id)->delete();

        return redirect('profile/'.$request->platformId);
    }



}
