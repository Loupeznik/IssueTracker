<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function issue() {
        return $this->belongsToMany(Issue::class, 'types_id', 'id');
    }
}
