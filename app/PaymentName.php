<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentName extends Model
{
    public function paymentnumbers()
    {
        return $this->hasMany(Paymentnumber::class);
    }

}//end class
