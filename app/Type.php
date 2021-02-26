<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function issue() {
        return $this->belongsTo(Issue::class, 'id', 'types_id');
    }
}
