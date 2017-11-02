<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Read extends Model
{
    public function choice()
    {
        return $this->belongsTo(Choice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
