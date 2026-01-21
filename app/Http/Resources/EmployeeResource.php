<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'employee_number' => $this->employee_number,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'department' => $this->department,
            'position' => $this->position,
            'manager' => $this->manager,
            'status' => $this->status,
            'hire_date' => $this->hire_date,
            'termination_date' => $this->termination_date,
            'access_level' => $this->access_level,
            'badge_id' => $this->badge_id,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ];
    }
}
