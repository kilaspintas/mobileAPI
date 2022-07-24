<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataNote extends Model
{
    use HasFactory;

    protected $table = 'data_notes';
    protected $fillable = [
        'email',
        'nama',
        'judul',
        'deskripsi'
    ];

    protected $hidden = [];
}
