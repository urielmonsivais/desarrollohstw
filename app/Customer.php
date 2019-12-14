<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'name',
        'birth_date',
        'curp',
        'rfc',
        'street',
        'in',
        'en',
        'desctription',
        'cp',
        'suburn',
        'city',
        'state',
        'country',
        'status',
        'suburb'
    ];


    public function bankLoans()
    {
        return $this->hasMany(BankLoan::class);
    }

    #Regresa todas las tarjetas que tenga asociado
    public function creditCards()
    {
        return $this->hasMany(CreditCard::class);
    }


    public function bureau()
    {
        return $this->hasOne(CreditBureau::class);
    }

    public function bankPasses()
    {
        return $this->hasMany(BankPasses::class);
    }
}
