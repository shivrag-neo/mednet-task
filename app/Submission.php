<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submission extends Model
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the user that owns the submission.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the header record associated with the submission.
     */
    public function header()
    {
        return $this->hasOne(Header::class);
    }

    /**
     * Get the claim record associated with the submission.
     */
    public function claim()
    {
        return $this->hasOne(Claim::class);
    }
}
