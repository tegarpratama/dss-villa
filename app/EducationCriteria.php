<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationCriteria extends Model
{
    protected $guarded = [];

    public function applicant()
    {
        return $this->hasOne(Applicant::class);
    }
}
