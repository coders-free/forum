<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['id_cliente', 'rut', 'email', 'name', 'points'];


    //Relacion uno a muchos

    public function codes(){
        return $this->hasMany(Code::class);
    }

    //Relacion muchos a muchos

    public function vouchers(){
        return $this->belongsToMany(Voucher::class, 'favorites');
    }
}
