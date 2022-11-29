<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Favorite_medias;

class My_User extends Model
{
    use HasFactory;
    public function favorite_medias()
    {
        return $this->hasMany(Favorite_medias::class);
    }
}
