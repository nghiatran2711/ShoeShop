<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderVerify extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'order_verifies';

    protected $fillable = [
        'user_id',
        'status',
        'code',
        'expire_date',
    ];

    public const STATUS = [
        0, // code avilable
        1, //  code expired data or not available
    ];
}
