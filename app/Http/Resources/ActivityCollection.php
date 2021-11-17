<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ActivityCollection extends ResourceCollection
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
            'a_id' => $this->a_id,
            'start' => $this->start,
            'type' => $this->type,
            'code' => $this->code,
            'quantity' => $this->quantity,
            'net' => $this->net,
            'clinician' => $this->clinician,
            'observation' => ObservationCollection::collection($this->observation),
        ];
    }
}
