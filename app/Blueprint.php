<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blueprint extends Model
{
    public function features()
    {
        return $this->hasMany('App\Feature');
    }
}
