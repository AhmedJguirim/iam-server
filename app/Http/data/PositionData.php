<?php

namespace App\Http\data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class PositionData extends Data
{
    public function __construct(
        public readonly int $id,
        #[Max(100)]
        public string $name,
        #[Unique('positions', 'code')]
        #[Max(20)]
        public string $code,
        #[Nullable]
        public ?string $description,
        public int $department_id,
        public bool $is_active,
        #[WithCast(DateTimeInterfaceCast::class)]
        public CarbonImmutable $created_at,
        #[WithCast(DateTimeInterfaceCast::class)]
        public CarbonImmutable $updated_at,
        #[WithCast(DateTimeInterfaceCast::class)]
        #[Nullable]
        public ?CarbonImmutable $deleted_at,
    ) {
    }
}