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

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
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

    public function latestPrice()
    {
        $currentdate = date('Y-m-d');
        return $this->hasOne(Price::class)
            ->where('end_date', '>=', $currentdate)
            ->where('status', Price::STATUS[1])
            ->first();
    }

    public function promotions(){
        return $this->hasMany(Promotion::class);
    }
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
}
