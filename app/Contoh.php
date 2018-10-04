<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contoh extends Model
{
  protected $table = 'contoh';
  protected $primaryKey = 'id';
  protected $fillable = [
    'nama_contoh',
    'deskripsi',
    'link',
    'id_produk',
    'fotocontoh',
  ];

  public function produk() {
    return $this->belongsTo('App\Produk', 'id_produk');
  }
}
