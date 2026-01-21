<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\AccessLevel;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EmployeeController
 */
final class EmployeeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $employees = Employee::factory()->count(3)->create();

        $response = $this->get(route('employees.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EmployeeController::class,
            'store',
            \App\Http\Requests\EmployeeStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $employee_number = fake()->word();
        $first_name = fake()->firstName();
        $last_name = fake()->lastName();
        $email = fake()->safeEmail();
        $department = Department::factory()->create();
        $position = Position::factory()->create();
        $status = fake()->randomElement(/** enum_attributes **/);
        $hire_date = Carbon::parse(fake()->date());
        $access_level = AccessLevel::factory()->create();
        $created_by = fake()->word();
        $updated_by = fake()->word();

        $response = $this->post(route('employees.store'), [
            'employee_number' => $employee_number,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'department_id' => $department->id,
            'position_id' => $position->id,
            'status' => $status,
            'hire_date' => $hire_date->toDateString(),
            'access_level_id' => $access_level->id,
            'created_by' => $created_by,
            'updated_by' => $updated_by,
        ]);

        $employees = Employee::query()
            ->where('employee_number', $employee_number)
            ->where('first_name', $first_name)
            ->where('last_name', $last_name)
            ->where('email', $email)
            ->where('department_id', $department->id)
            ->where('position_id', $position->id)
            ->where('status', $status)
            ->where('hire_date', $hire_date)
            ->where('access_level_id', $access_level->id)
            ->where('created_by', $created_by)
            ->where('updated_by', $updated_by)
            ->get();
        $this->assertCount(1, $employees);
        $employee = $employees->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $employee = Employee::factory()->create();

        $response = $this->get(route('employees.show', $employee));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EmployeeController::class,
            'update',
            \App\Http\Requests\EmployeeUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $employee = Employee::factory()->create();
        $employee_number = fake()->word();
        $first_name = fake()->firstName();
        $last_name = fake()->lastName();
        $email = fake()->safeEmail();
        $department = Department::factory()->create();
        $position = Position::factory()->create();
        $status = fake()->randomElement(/** enum_attributes **/);
        $hire_date = Carbon::parse(fake()->date());
        $access_level = AccessLevel::factory()->create();
        $created_by = fake()->word();
        $updated_by = fake()->word();

        $response = $this->put(route('employees.update', $employee), [
            'employee_number' => $employee_number,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'department_id' => $department->id,
            'position_id' => $position->id,
            'status' => $status,
            'hire_date' => $hire_date->toDateString(),
            'access_level_id' => $access_level->id,
            'created_by' => $created_by,
            'updated_by' => $updated_by,
        ]);

        $employee->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($employee_number, $employee->employee_number);
        $this->assertEquals($first_name, $employee->first_name);
        $this->assertEquals($last_name, $employee->last_name);
        $this->assertEquals($email, $employee->email);
        $this->assertEquals($department->id, $employee->department_id);
        $this->assertEquals($position->id, $employee->position_id);
        $this->assertEquals($status, $employee->status);
        $this->assertEquals($hire_date, $employee->hire_date);
        $this->assertEquals($access_level->id, $employee->access_level_id);
        $this->assertEquals($created_by, $employee->created_by);
        $this->assertEquals($updated_by, $employee->updated_by);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $employee = Employee::factory()->create();

        $response = $this->delete(route('employees.destroy', $employee));

        $response->assertNoContent();

        $this->assertSoftDeleted($employee);
    }
}
