<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id','sub_category_id','title','slug','short_description','long_description','strike_price','discount_price','trending','popular','color_id','shoesize_id','clothsize_id'];

    public function title() : Attribute
    {
        return Attribute::make(
            set: fn($value) => [
                'title'=>ucfirst($value),
                'slug' => Str::slug($value),
            ]
        );
    }
    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id');
    }
    public function reviews()
    {
        return $this->morphMany(Review::class,'reviewable')->orderBy('id','desc');
    }
    public function clothSize($ids)
    {
        $cloth_sizes =  Color::whereIn('id',$ids)->pluck('title');
        return $cloth_sizes;
    }
}
