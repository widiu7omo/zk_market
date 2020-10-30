<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pegawais';

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
    protected $fillable = ['nama', 'jenis_kelamin', 'nohp', 'alamat', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
}
