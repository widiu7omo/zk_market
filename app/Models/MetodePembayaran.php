<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'metode_pembayarans';

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
    protected $fillable = ['metode', 'desc', 'kode', 'icon', 'status', 'holder'];

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class);
    }

}
