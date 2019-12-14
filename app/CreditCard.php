<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    protected $table = 'credit_cards';

    protected $fillable = [
        'number',
        'due_date',
        'type',
        'description',
        'customer_id'
    ];



    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }
}
