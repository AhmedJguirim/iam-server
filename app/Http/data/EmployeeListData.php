<?php

namespace App\Http\data;

use Spatie\LaravelData\Data;

class EmployeeListData extends Data
{
    public function __construct(
        public readonly string $id,
        public string $first_name,
        public string $last_name,
        public string $email,
        public ?string $phone_number,
        public array $department,
        public array $position,
        public array $access_level,
    ) {
    }

    public static function fromModel($employee): self
    {
        return new self(
            id: $employee->id,
            first_name: $employee->first_name,
            last_name: $employee->last_name,
            email: $employee->email,
            phone_number: $employee->phone_number,
            department: [
                'id' => $employee->department?->id,
                'name' => $employee->department?->name,
            ],
            position: [
                'id' => $employee->position?->id,
                'name' => $employee->position?->name,
            ],
            access_level: [
                'id' => $employee->accessLevel?->id,
                'name' => $employee->accessLevel?->name,
            ],
        );
    }
}
