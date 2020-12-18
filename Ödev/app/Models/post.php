<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    public $table = "post";
    public $timestamps=false;
    protected $fillable=[
      'isim',
      'icerik',
      'kategori_id'
    ];
}
