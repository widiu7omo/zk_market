<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'produks';

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
    protected $fillable = ['nama', 'harga', 'harga_promo', 'deskripsi', 'gambar', 'kategori_id', 'terlaris', 'promosi', 'status'];
    protected $columns = ['id', 'nama', 'harga', 'harga_promo', 'deskripsi', 'gambar', 'kategori_id', 'terlaris', 'promosi', 'status'];

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori');
    }

    public function scopeExclude($query, $value = [])
    {
        return $query->select(array_diff($this->columns, (array)$value));
    }

}
