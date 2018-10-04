<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Item;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = [
      'nama_produk',
    ];

    public function item() {
      return $this->hasMany('App\Item', 'id_produk');
    }

    public function contoh() {
      return $this->hasMany('App\Contoh', 'id_produk');
    }
}
