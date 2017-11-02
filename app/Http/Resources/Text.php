<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Text extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'delay' => $this->delay,
            'speed' => $this->speed,
            'order' => $this->order,
        ];
    }
}
