<?php

namespace App\Observers;

use App\Models\AuditLog;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Mockery\Undefined;

class EmployeeObserver
{
    /**
     * Handle the Employee "created" event.
     */
    public function created(Employee $employee): void
    {
    }

    /**
     * Handle the Employee "updated" event.
     */
    public function updated(Employee $employee): void
    {
        $creator = Auth::user();
        $action = 'EMPLOYEE UPDATED';
        $dirtyValues = $employee->getDirty();
        if (array_key_exists('picture', $dirtyValues)) {
            $action = 'EMPLOYEE PICTURE UPDATED';
        }

        $previousValues = [];
        foreach ($dirtyValues as $attribute => $newValue) {
            $previousValues[$attribute] = $employee->getOriginal($attribute);
        }

        $data = [
            'user_id' => $creator->user_id,
            'action' => $action,
            'auditable_type' => get_class($employee),
            'auditable_id' => $employee->employee_id,
            'old_values' => json_encode($previousValues),
            'new_values' => json_encode($dirtyValues),
        ];

        $auditLog = new AuditLog();
        $auditLog->fill($data)->save();
    }

    /**
     * Handle the Employee "deleted" event.
     */
    public function deleted(Employee $employee): void
    {
        //
    }

    /**
     * Handle the Employee "restored" event.
     */
    public function restored(Employee $employee): void
    {
        //
    }

    /**
     * Handle the Employee "force deleted" event.
     */
    public function forceDeleted(Employee $employee): void
    {
        //
    }
}
