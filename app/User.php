<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reads()
    {
        return $this->hasMany(Read::class);
    }

    public function getCurrentPageAttribute()
    {
        $read = $this->reads()->get()->last();
        if ($read != null) {
            return $read->choice->nextPage;
        }
        return null;
    }
}
