<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),

            // Human-readable (diff):
            // 'created_at' => $this->created_at->diffForHumans(),
            // 'updated_at' => $this->updated_at->diffForHumans(),

            // ISO 8601 standard (good for APIs):
            // 'created_at' => $this->created_at->toIso8601String(),
            // 'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}
