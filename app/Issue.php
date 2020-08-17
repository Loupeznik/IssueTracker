<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issue extends Model
{

    use SoftDeletes;

    protected $fillable = ['Name','Desc','types_id','priority_id','status_id'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function type() {
        return $this->hasOne(Type::class, 'id', 'types_id');
    }
    
    public function priority() {
        return $this->hasOne(Priority::class, 'id', 'priority_id');
    }

    public function status() {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

}
