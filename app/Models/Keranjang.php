<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\User;


class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'keranjang';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    
    public function barang()
    {
        return $this->belongsTo(Barng::class, 'id_barang');
    }

}
