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
        'bukti',
        'status_expired',
        'qrstring'
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class,'pesanan_id');
    }
}
