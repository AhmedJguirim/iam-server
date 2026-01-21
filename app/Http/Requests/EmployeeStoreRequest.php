<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'employee_number' => ['required', 'string', 'max:20', 'unique:employees,employee_number'],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255', 'unique:employees,email'],
            'phone_number' => ['nullable', 'string', 'max:20'],
            'department_id' => ['required', 'integer', 'exists:departments,id'],
            'position_id' => ['required', 'integer', 'exists:positions,id'],
            'manager_id' => ['nullable'],
            'status' => ['required', 'in:active,inactive,on_leave,terminated,suspended'],
            'hire_date' => ['required', 'date'],
            'termination_date' => ['nullable', 'date'],
            'access_level_id' => ['required', 'integer', 'exists:access_levels,id'],
            'badge_id' => ['nullable', 'string', 'max:50', 'unique:employees,badge_id'],
            'created_by' => ['required', 'string', 'max:100'],
            'updated_by' => ['required', 'string', 'max:100'],
        ];
    }
}
