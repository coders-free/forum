<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Voucher extends Model
{
    use HasFactory;

    /* protected $guarded = ['id', 'created_at', 'updated_at']; */
    protected $fillable = ['brand_id', 'voucher_type', 'registration_date', 'expiration_date', 'title', 'slug','description', 'description2', 'url', 'text_button', 'image'];

    protected $casts = [
        'registration_date' => 'datetime:Y-m-d',
        'expiration_date' => 'datetime:Y-m-d',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Query Scopes

    public function scopeBrand($query, $brand_id){
        if($brand_id){
            return $query->where('brand_id', $brand_id);
        }
    }

    //Atributos
    public function getCheckAttribute(){
        if (session('customer')) {
            return $this->customers->contains(session('customer')->id);
        }else{
            return false;
        }
        
    }
   

    //Relacion uno a uno

    public function video(){
        return $this->hasOne(Video::class);
    }


    //Relacion uno a muchos
    public function codes(){
        return $this->hasMany(Code::class);
    }


    //Relacion uno a muchos inversa

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    //Relacion muchos a muchos

    public function customers(){
        return $this->belongsToMany(Customer::class,'favorites');
    }


}
