<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function texts()
    {
    	return $this->belongsToMany(Text::class);
    }

    public function choices()
    {
    	return $this->belongsToMany(Choice::class);
    }
}
