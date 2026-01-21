<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeesListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'email' => $this->email,
            'phoneNumber' => $this->phone_number,
            'department' => $this->department ? $this->department->name : null,
            'jobTitle' => $this->position ? $this->position->name : null,
            'accessLevel' => $this->access_level ? $this->access_level->name : null,
        ];
    }
}
