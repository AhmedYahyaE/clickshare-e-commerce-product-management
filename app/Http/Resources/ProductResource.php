<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request); // Return all fields from the model (default)

        return [
            'id'          => $this->id,
            'created_at'  => $this->created_at->toDateTimeString(), // Convert Carbon instance to a readable string (example: 2024-12-10T02:14:56.000000Z to 2024-12-10 02:14:56)
            'updated_at'  => $this->updated_at->toDateTimeString(), // Convert Carbon instance to a readable string (example: 2024-12-10T02:14:56.000000Z to 2024-12-10 02:14:56)
            'name'        => $this->name,
            'description' => $this->description,
            'price'       => $this->price,
            'quantity'    => $this->quantity,
        ];
    }
}
