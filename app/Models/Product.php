<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable=[
        'name',
        'description',
        'thumbnail',
        'category_id',
        'brand_id',
        'is_feature',
        'status',
    ];
    public $timestamps = true;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function product_detail(){
        return $this->hasOne(ProductDetail::class);
    }

    public function product_images(){
        return $this->hasMany(ProductImage::class);
    }

    public function sizes() {
        return $this->belongsToMany(Size::class, 'product_size', 'product_id', 'size_id')->withPivot('quantity')->withTimestamps();
    }

    public function prices(){
        return $this->hasMany(Price::class);
    }

    public function promotions(){
        return $this->hasMany(Promotion::class);
    }
}
