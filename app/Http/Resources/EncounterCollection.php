<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EncounterCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'facility_id' => $this->facility_id,
            'type' => $this->type,
            'patient_id' => $this->patient_id,
            'start' => $this->start,
            'end' => $this->end,
            'start_type' => $this->start_type,
            'end_type' => $this->end_type,
        ];
    }
}
