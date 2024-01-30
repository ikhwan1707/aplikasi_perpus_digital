<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Buku;

class Ulasanbuku extends Model
{
    protected $table = 'tb_ulasanbuku';
    protected $primaryKey = 'UlasanID';
    protected $fillable = ['UserID', 'BukuID', 'Ulasan', 'Rating'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'BukuID');
    }
}