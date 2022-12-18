<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function murids(){
        return $this->belongsToMany('App\Models\Murid') -> withTimestamps();
    }
}
