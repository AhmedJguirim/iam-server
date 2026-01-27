<?php

namespace App\Http\data;
use App\Enums\EmployeeStatus;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Collection;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Date;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Lazy;

class EmployeeData extends Data
{
    public function __construct(
        public readonly string $id,
        #[Unique('employees', 'employee_number')]
        #[Max(20)]
        public string $employee_number,
        #[Max(100)]
        public string $first_name,
        #[Max(100)]
        public string $last_name,
        #[Unique('employees', 'email')]
        #[Email]
        #[Max(255)]
        public string $email,
        #[Nullable]
        #[Max(20)]
        public ?string $phone_number,
        public Lazy|DepartmentData $department,
        public Lazy|PositionData $position,
        public ?string $manager_id,
        public EmployeeStatus $status = EmployeeStatus::ACTIVE,
        #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d')]
        #[Date('Y-m-d')]
        public CarbonImmutable $hire_date,
        #[WithCast(DateTimeInterfaceCast::class, format: 'Y-m-d')]
        #[Nullable]
        #[Date('Y-m-d')]
        public ?CarbonImmutable $termination_date,
        public Lazy|AccessLevelData $access_level,
        #[Nullable]
        #[Unique('employees', 'badge_id')]
        #[Max(50)]
        public ?string $badge_id,
        #[Max(100)]
        public ?string $created_by,
        #[Max(100)]
        public ?string $updated_by,
        #[WithCast(DateTimeInterfaceCast::class)]
        public ?CarbonImmutable $created_at,
        #[WithCast(DateTimeInterfaceCast::class)]
        public ?CarbonImmutable $updated_at,
        #[WithCast(DateTimeInterfaceCast::class)]
        #[Nullable]
        public ?CarbonImmutable $deleted_at,

        public ?Collection $access_groups,

    ) {
    }
}