<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'url_logo', 'category_id'];

    //Relacion uno a muchos
    public function vouchers(){
        return $this->hasMany(Voucher::class);
    }

    //Relacion uno a muchos inversa
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
