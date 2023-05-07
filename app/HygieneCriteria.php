<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HygieneCriteria extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function villa()
    {
        return $this->hasOne(Villa::class);
    }
}