<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{

    use Notifiable;

    protected $table = 'data_pelapor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'nama', 'email', 'password', 'no_id', 'id_asal'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getNamaDepan()
    {
        $nama = Auth::user()->nama;
        $nama = explode(' ', $nama);

        $namadepan = $nama[0];

        return $namadepan;
    }

}
