<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    public function text() {
    	return $this->belongsTo(Text::class, 'text_id');
    }

    public function nextPage() {
    	return $this->belongsTo(Page::class, 'nextPage_id');
    }
}
