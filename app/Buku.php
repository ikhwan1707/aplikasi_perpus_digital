<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kategoribuku;
use App\Koleksipribadi;
use App\Ulasanbuku;

class Buku extends Model
{
    protected $primaryKey = 'BukuID';
    protected $table = 'tb_buku';
    protected $fillable = [
        'KodeBuku',
        'KategoriID',
        'Judul',
        'Deskripsi',
        'Penulis',
        'Penerbit',
        'TahunTerbit',
        'Image',
        'Stock',
        'Status'
    ];

    public function Kategoribuku()
    {
        return $this->belongsTo(Kategoribuku::class, 'KategoriID', 'KategoriID');
    }

    public function Koleksipribadi()
    {
        return $this->hasMany(Koleksipribadi::class, 'BukuID', 'BukuID');
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasanbuku::class, 'BukuID', 'BukuID');
    }
}