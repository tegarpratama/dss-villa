<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcceptanceCriteria extends Model
{
    protected $guarded = [];
    public $table = 'master_criterias';
    public $timestamps = false;
}
