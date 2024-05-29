<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NotebookResource extends JsonResource
{
    public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            "fullName" => $this->full_name,
            "company" => $this->company,
            "phone" => $this->phone,
            "email" => $this->email,
            "dateOfBirth" => $this->date_of_birth,
            'photoUrl' => $this->photo_url
        ];
    }
}
