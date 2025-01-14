<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request); // Default ('data', 'links', 'meta','path', 'per_page', 'to', and 'total' keys)

        // Create a custom response ('meta' data key) along with the collection
        // return [
        //     'data' => $this->collection,
        //     'meta' => [
        //         'count' => $this->count()
        //     ]
        // ];
    }
}
