<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'detail_pesanans';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['pesanan_id', 'produk_id', 'jumlah', 'subtotal'];

    public function produk()
    {
        return $this->belongsTo('App\Models\Produk');
    }
    public function pesanan()
    {
        return $this->belongsTo('App\Models\Pesanan');
    }
    
}
