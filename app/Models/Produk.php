<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Distribution;

class Produk extends Model
{
    protected $table = 'produk';

    protected $guarded = ['id'];

    public function distributions()
    {
        return $this->hasMany(Distribution::class);
    }
}
