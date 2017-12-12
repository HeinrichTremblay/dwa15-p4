<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function blueprints()
    {
        return $this->belongsToMany('App\Blueprint')->withTimestamps();
    }
}
