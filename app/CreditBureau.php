<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditBureau extends Model
{
    protected $table = 'credit_bureaus';

    protected $fillable = [
        'state',
        'description',
        'customer_id'
    ];
}
