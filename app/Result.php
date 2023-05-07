<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function villa()
    {
        return $this->belongsTo(Villa::class);
    }
}
