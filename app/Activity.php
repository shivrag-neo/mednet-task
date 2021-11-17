<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the observation record associated with the Activity.
     */
    public function observation()
    {
        return $this->hasOne(Observation::class);
    }
}
