<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Villa extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function price()
    {
        return $this->belongsTo(PriceCriteria::class, 'price_criteria_id', 'id');
    }

    public function location()
    {
        return $this->belongsTo(LocationCriteria::class,  'location_criteria_id', 'id');
    }

    public function facility()
    {
        return $this->belongsTo(FacilityCriteria::class, 'facility_criteria_id', 'id');
    }
 
    public function hygiene()
    {
        return $this->belongsTo(HygieneCriteria::class, 'hygiene_criteria_id', 'id');
    }
   
    public function security()
    {
        return $this->belongsTo(SecurityCriteria::class, 'security_criteria_id', 'id');
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
