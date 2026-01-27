<?php

namespace App\Http\data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;

class AccessLevelData extends Data
{
    public function __construct(
        public readonly int $id,
        #[Unique('access_levels', 'name')]
        #[Max(50)]
        public string $name,
        #[Unique('access_levels', 'code')]
        #[Max(20)]
        public string $code,
        #[Nullable]
        public ?string $description,
        public int $priority,
        #[WithCast(DateTimeInterfaceCast::class)]
        public ?CarbonImmutable $created_at,
        #[WithCast(DateTimeInterfaceCast::class)]
        public ?CarbonImmutable $updated_at,
    ) {
    }
}