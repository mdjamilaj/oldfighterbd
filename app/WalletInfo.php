<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletInfo extends Model
{
    protected $fillable = [
        'user_id', 'paymentMethod','transactionid', 'paymentNumber', 'amount', 'status'
    ];

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'paymentMethod', 'id');
    }
}
