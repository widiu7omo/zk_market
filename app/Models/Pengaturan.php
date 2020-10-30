<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pengaturans';

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
    protected $fillable = ['nama_bisnis', 'no_wa', 'tipe_ongkir', 'alamat', 'lat', 'long', 'google_api', 'name'];


}
