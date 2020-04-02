<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'address', 'amount', 'store_amount', 'currency', 'tran_id', 'bank_tran_id', 'card_type', 'card_no', 'card_brand', 'card_issuer_country'];
}
