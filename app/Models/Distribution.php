<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class Distribution extends Model
{
    protected $table = 'distributions';

    protected $guarded = ['id'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
