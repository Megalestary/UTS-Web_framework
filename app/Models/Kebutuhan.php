<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kebutuhan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kebutuhan';
    protected $fillable = ["jenis_kebutuhan","deskripsi","kebutuhan_tentang","foto_dan_vidio"];
}
