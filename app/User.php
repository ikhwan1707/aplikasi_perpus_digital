<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Koleksipribadi;
use App\Ulasanbuku;
use App\Peminjaman;

class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = 'UserID';
    protected $table = 'tb_user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Username', 'Namalengkap', 'Email', 'Password', 'Alamat', 'Role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Koleksipribadi()
    {
        return $this->hasMany(Koleksipribadi::class, 'UserID', 'UserID');
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasanbuku::class, 'BukuID', 'BukuID');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'UserID','UserID');
    }
}