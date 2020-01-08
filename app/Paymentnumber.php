<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymentnumber extends Model
{

    public function payment_name()
    {
        return $this->belongsTo(PaymentName::class);
    }

}//end class
