<?php

namespace App\Mail;

use App\Profile;
use App\Qrcode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DonorRecept extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $qrcodeId;
    private $amount;
    private $transactionNum;
    public function __construct($qrcodeId,$amount,$transactionNum)
    {
        //
         $this->qrcodeId = $qrcodeId;
        $this->amount= $amount;
        $this->transactionNum = $transactionNum;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       $vendor= Profile::where('platformId',Qrcode::find($this->qrcodeId)->platformId)->pluck('companyname')->first() ;
        $registrationNum = Qrcode::find($this->qrcodeId)->companyreg;
            $transactionNum = $this->transactionNum;
        return $this->view('mails.donor-receipt')
            ->with('amount',$this->amount)
            ->with('vendorName',$vendor)
            ->with('registrationNum',$registrationNum)
            ->with('transactionNum',$transactionNum)
            ->subject('OlliePay donation receipt');
    }
}
