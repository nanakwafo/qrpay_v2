<?php

namespace App\Http\Controllers;

use App\Helpers\Stripeuser;
use App\Transaction;
use Illuminate\Http\Request;
use PDF;
class PdfController extends Controller
{
    //
    public function export_pdf($platformId,$qrCodeId=''){

        $accountId = Stripeuser::getaccountId($platformId);
        // Fetch all customers from database
        if(!empty($qrCodeId)){
            $data =  Transaction::where(['accountId'=>$accountId ,'qrcode_id'=>$qrCodeId ])->get();
        }else{
            $data =  Transaction::where('accountId',$accountId)->get();
        }


        // Send data to the view using loadView function of PDF facade
        $pdf = PDF::loadView('pdf.transactions',['data'=>$data]);
        // If you want to store the generated pdf to the server then you can use the store function
        $pdf->save(storage_path().'_transactions.pdf');
        // Finally, you can download the file using download function
        return $pdf->download('transactions.pdf');
    }
}
