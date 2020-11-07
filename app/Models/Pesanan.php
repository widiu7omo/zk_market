<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pesanans';
    protected $fillable = ['waktu_pesan', 'waktu_sampai', 'tanggal', 'total_bayar', 'total_ongkir', 'catatan', 'status_pesanan_id', 'status_bayar_id', 'alamat_id', 'pegawai_id'];
    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function status_pesanan()
    {
        return $this->belongsTo('App\Models\StatusPesanan');
    }

    public function status_bayar()
    {
        return $this->belongsTo('App\Models\StatusBayar');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pegawai()
    {
        return $this->belongsTo(\App\Models\Pegawai::class, 'pegawai_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alamat()
    {
        return $this->belongsTo(\App\Models\Alamat::class, 'alamat_id');
    }

    public function detail_pesanans()
    {
        return $this->hasMany(DetailPesanan::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}
