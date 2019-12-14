<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BankLoan extends Model
{
    protected $table = 'bank_loans';

    protected $fillable = [
        'amount',
        'application_date',
        'payment_deadline',
        'status',
        'description',
        'user_id',
        'customer_id',
    ];



    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
