<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\My_User;

class Favorite_medias extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsTo(My_User::class);
    }
}
