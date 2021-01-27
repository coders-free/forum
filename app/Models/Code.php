<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $fillable = ['value', 'voucher_id', 'customer_id'];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
