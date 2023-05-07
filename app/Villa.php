<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    protected $guarded = [];

    public function education()
    {
        return $this->belongsTo(EducationCriteria::class, 'education_criteria_id', 'id');
    }

    public function experience()
    {
        return $this->belongsTo(ExperienceCriteria::class, 'experience_criteria_id', 'id');
    }

    public function major()
    {
        return $this->belongsTo(MajorCriteria::class, 'major_criteria_id', 'id');
    }

    public function result()
    {
        return $this->hasOne(Result::class);
    }

    public function rank()
    {
        return $this->hasOne(Rank::class);
    }
}
