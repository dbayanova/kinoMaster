<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\Favorite_medias;

class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'fullName',
        'login',
        'password',
    ];

    protected $hidden = [
        'password'
       
    ];

    public function favorite_medias()
    {
        return $this->hasMany(Favorite_medias::class);
    }
}
