<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['grand_total','email','phone_no','first_name','last_name','address','apartment_no','city','country','postal_code','order_note','status','subtotal','discount'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')->withTimestamps()->withPivot(['quantity','price','color','cloth_size','shoe_size']);
    }
}
