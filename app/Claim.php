<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the encounter record associated with the Claim.
     */
    public function encounter()
    {
        return $this->hasOne(Encounter::class);
    }

    /**
     * Get the diagnosis record associated with the Claim.
     */
    public function diagnosis()
    {
        return $this->hasOne(Diagnosis::class);
    }

    /**
     * Get the activity record associated with the Claim.
     */
    public function activity()
    {
        return $this->hasOne(Activity::class);
    }
}
