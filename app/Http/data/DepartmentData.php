<?php

namespace App\Http\data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class DepartmentData extends Data
{
    public function __construct(
        public readonly int $id,
        #[Max(100)]
        public string $name,
        #[Unique('departments', 'code')]
        #[Max(20)]
        public string $code,
        #[Nullable]
        public ?string $description,
        public bool $is_active,
        #[WithCast(DateTimeInterfaceCast::class)]
        public ?CarbonImmutable $created_at,
        #[WithCast(DateTimeInterfaceCast::class)]
        public ?CarbonImmutable $updated_at,
        #[WithCast(DateTimeInterfaceCast::class)]
        #[Nullable]
        public ?CarbonImmutable $deleted_at,
    ) {
    }
}
