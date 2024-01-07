<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'user_id',
        'item_id',
        'order_id',
        'expired_at',
        'is_used'
    ];

    public function user () {
        return $this->belongsTo(User::class);
    }
}
