<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankPasses extends Model
{
    protected $table = 'bank_passes';

    protected $fillable = [
        'number',
        'amount',
        'application_date',
        'status',
        'bank_loan_id',
        'customer_id',
        'credit_card_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function creditCard()
    {
        return $this->belongsTo(CreditCard::class);
    }
}
