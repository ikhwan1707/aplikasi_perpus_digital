<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kategoribuku;

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
}