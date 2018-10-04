<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Produk;

use App\Order;

class Item extends Model
{
    protected $table = 'item';
    protected $primaryKey = 'id';
    protected $fillable = [
      'id_produk',
      'nama_item',
    ];

    public function produk() {
      return $this->belongsTo('App\Produk', 'id_produk');
    }

    public function order() {
    	return $this->hasOne('App\Order', 'id_item');
    }
}
