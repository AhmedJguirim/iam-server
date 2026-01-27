<?php

namespace App\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class EmployeeAccessGroupData extends Data
{
    public function __construct(
        public readonly int $id,
        public string $employee_id,
        public int $access_group_id,
        #[WithCast(DateTimeInterfaceCast::class)]
        public CarbonImmutable $granted_at,
        public string $granted_by,
        #[WithCast(DateTimeInterfaceCast::class)]
        #[Nullable]
        public ?CarbonImmutable $expires_at,
        #[WithCast(DateTimeInterfaceCast::class)]
        public CarbonImmutable $created_at,
        #[WithCast(DateTimeInterfaceCast::class)]
        public CarbonImmutable $updated_at,
    ) {
    }
}