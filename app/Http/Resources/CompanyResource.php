<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'owner' => $this->owner,
            'Created' => date_format(date_create($this->created_at), 'Y-m-d h:i:s a'),
            'branches' => $this->branches
        ];
    }
}
