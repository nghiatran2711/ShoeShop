<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sizes';

    protected $fillable=[
        'name'
    ];
    public function products() {
        return $this->belongsToMany('App\Models\Product', 'product_size', 'product_id', 'size_id');
      }
}
