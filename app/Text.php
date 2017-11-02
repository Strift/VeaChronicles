<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $fillable = ['content'];

    public function page()
    {
        return $this->belongsTo(\App\Page::class);
    }
}
