<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Price extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'prices';
    
    protected $fillable=[
        'price',
        'product_id',
        'begin_date',
        'end_date',
        'status'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public const STATUS = [
        0, // Private
        1, // Public 
    ];
}
