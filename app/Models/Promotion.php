<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'name',
        'quantity',
        'discount',
        'begin_date',
        'end_date',
        'status'
    ];
    // public function product(){
    //     return $this->belongsTo(Product::class);
    // }
}
