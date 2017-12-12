<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    public function blueprint()
    {
        return $this->belongsTo('App\Blueprint');
    }

    public static function getPriority($value, $complexity)
    {
        $priority = 0;

        if ($value > 5 && $complexity < 5) {
            // top left
            $priority = $value - $complexity + 10000;
        } else if ($value > 5 && $complexity >= 5) {
            // top right
            $priority = $value - $complexity + 1000;
        } else if ($value <= 5 && $complexity < 5) {
            // bottom left
            $priority = $value - $complexity + 100;
        } else {
            // bottom right
            $priority = $value - $complexity + 10;
        }

        return $priority;
    }

    public function save(array $options = array())
    {

        $this->priority = $this->getPriority($this->value, $this->complexity);

        parent::save($options);
    }
}
