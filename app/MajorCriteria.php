<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MajorCriteria extends Model
{
    protected $guarded = [];

    public function applicant()
    {
        return $this->hasOne(Applicant::class);
    }
}
