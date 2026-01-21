<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_number',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'department_id',
        'position_id',
        'manager_id',
        'status',
        'hire_date',
        'termination_date',
        'access_level_id',
        'badge_id',
        'created_by',
        'updated_by',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'department_id' => 'integer',
            'position_id' => 'integer',
            'hire_date' => 'date',
            'termination_date' => 'date',
            'access_level_id' => 'integer',
        ];
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(Employee::class, "manager_id", "id");
    }

    public function accessLevel(): BelongsTo
    {
        return $this->belongsTo(AccessLevel::class);
    }
}
