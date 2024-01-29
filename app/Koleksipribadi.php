<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Buku;

class Koleksipribadi extends Model
{
    protected $table = 'tb_koleksipribadi';
    protected $fillable = ['UserID', 'BukuID'];

    protected $primaryKey = 'KoleksiID';

    public function User()
    {
        return $this->belongsTo(User::class, 'UserID', 'UserID');
    }

    public function Buku()
    {
        return $this->belongsTo(Buku::class, 'BukuID', 'BukuID');
    }
}