<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'alamats';

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
    protected $fillable = ['alamat_lengkap', 'rincian_alamat', 'lat', 'long', 'customer_id'];
    protected $columns = ['alamat_lengkap', 'rincian_alamat', 'lat', 'long', 'customer_id','id','updated_at','created_at'];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function scopeExclude($query, $value = [])
    {
        return $query->select(array_diff($this->columns, (array)$value));
    }

}
