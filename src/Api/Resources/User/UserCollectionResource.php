<?php

namespace AvoRed\Framework\Api\Resources\User;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }

    /**
     * Added a Status Success with Response
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function with($request)
    {
        return [
            'status' => 'success'
        ];
    }
}
