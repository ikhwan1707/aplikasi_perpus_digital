<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Buku;

class Kategoribuku extends Model
{
    protected $primaryKey = 'KategoriID';
    protected $table = 'tb_kategoribuku';
    protected $fillable = ['NamaKategori'];

    public function Buku()
    {
        return $this->hasMany(Buku::class, 'KategoriID', 'KategoriID');
    }
}
