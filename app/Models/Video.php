<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'voucher_id'];

    //Relacion uno a uno inversa

    public function voucher(){
        return $this->belongsTo(Voucher::class);
    }
}
