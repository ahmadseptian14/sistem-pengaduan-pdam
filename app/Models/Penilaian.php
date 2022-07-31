<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;



    protected $fillable = [
         'users_id', 'pengaduan_id', 'rating', 'komentar'
    ];

    protected $hidden = [
    
    ];

    public function user() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

        public function pengaduan()
        {
            return $this->belongsTo(Pengaduan::class,'pengaduan_id', 'id');
        }


    // public function pengaduans()
    // {
    //     return $this->hasMany(Pengaduan::class, 'pengaduan_id', 'id');
    // }

}
