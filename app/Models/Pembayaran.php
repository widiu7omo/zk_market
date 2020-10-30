<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'metode_pembayaran',
        'status_pembayaran',
        'amount',
        'callback',
        'external_id',
        'pesanan_id',
        'status_expired',
        'qrstring'
    ];
}
