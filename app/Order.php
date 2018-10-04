<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Item;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id';
    protected $fillable = [
      'nama',
      'alamat',
      'email',
      'no_telp',
      'id_item',
      'detail',
      'filebrief',
    ];

    public function item() {
        return $this->belongsTo('App\Item', 'id_item');
    }
}
