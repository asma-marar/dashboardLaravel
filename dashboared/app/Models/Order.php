<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',       
        'order_total',    
        'order_status',   
        'order_address', 
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function products()
{
    return $this->belongsToMany(Product::class, 'order_product')->withPivot('quantity');
}
}
