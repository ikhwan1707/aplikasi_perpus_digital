<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'tb_peminjaman';
    protected $primaryKey = 'PeminjamanID';
    protected $fillable = ['UserID', 'BukuID', 'TanggalPeminjaman', 'TanggalPengembalian','StatusPeminjaman', 'Tanggalpengembalianaktual'];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'UserID');
    }


    public function buku()
    {
        return $this->belongsTo(Buku::class, 'BukuID', 'BukuID');
    }

    public function ulasan()
    {
        return $this->hasOne(UlasanBuku::class, 'BukuID', 'BukuID')->where('UserID', $this->UserID);
    }
}