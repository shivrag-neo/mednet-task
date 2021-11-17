<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ClaimCollection extends ResourceCollection
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
            'c_id' => $this->c_id,
            'member_id' => $this->member_id,
            'payer_id' => $this->payer_id,
            'emirates_id_number' => $this->emirates_id_number,
            'gross' => $this->gross,
            'patient_share' => $this->patient_share,
            'net' => $this->net,
            'encounter' => EncounterCollection::collection($this->encounter),
            'diagnosis' => DiagnosisCollection::collection($this->diagnosis),
            'activity' => ActivityCollection::collection($this->activity),
        ];
    }
}
