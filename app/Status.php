<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function issue() {
        return $this->belongsTo(Issue::class, 'id', 'status_id');
    }
}
