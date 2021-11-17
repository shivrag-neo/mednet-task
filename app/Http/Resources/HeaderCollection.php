<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class HeaderCollection extends ResourceCollection
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
            'sender_id' => $this->sender_id,
            'receiver_id' => $this->receiver_id,
            'transaction_date' => $this->transaction_date,
            'record_count' => $this->record_count,
            'disposition_flag' => $this->disposition_flag,
        ];
    }
}
