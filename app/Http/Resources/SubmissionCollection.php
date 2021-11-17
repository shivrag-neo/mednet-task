<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SubmissionCollection extends ResourceCollection
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
            'id' => $this->id,
            //'user' => UserCollection::collection($this->user),
            //'header' => HeaderCollection::collection($this->header),
            //'claim' => ClaimCollection::collection($this->claim),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
