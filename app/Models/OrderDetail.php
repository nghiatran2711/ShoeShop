<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public $table = "order_detail";

    protected $fillable=[
        'order_id',
        'product_id',
        'price_id',
        'size_id',
        'quantity',
    ];
    public function order(){
        return $this->belongsTo(OrderDetail::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
