<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'kategoris';

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
    protected $fillable = ['kategori','icon'];

    public function produks()
    {
        return $this->hasMany('App\Models\Produk');
    }
}
