<?php

use App\Http\Controllers\Logs;
use App\Http\Controllers\LeaveCreate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceCreate;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeUserEmployee;
use App\Http\Controllers\LeaveController;
use Illuminate\Support\Facades\Artisan;

// log-out=====================================================
Route::get('/logout', [UserController::class, 'logout']);
// Log-in======================================================
Route::get('/', [UserController::class, 'showLogin']);
Route::post('/', [UserController::class, 'Login']);

// Admin=================================================
Route::prefix('Admin')->group(function () {
    Route::get('Employee/{id}/CreateUser', [UserController::class, 'UserCreate']);
    Route::post('Employee/{id}/CreateUser', [UserController::class, 'UserStore']);

    Route::get('Dashboard', [AdminController::class, 'ShowDashboard']);

    Route::get('Organization', [AdminController::class, 'ShowOrganization']);
    Route::resource('Organization/Department', DepartmentController::class);
    Route::resource('Organization/Position', PositionController::class);

    Route::resource('Employee', EmployeeController::class);
    Route::get('Employee/search', [AdminController::class, 'index'])->name('admin.employee.search');

    Route::get('Attendance', [AdminController::class, 'ShowAttendace']);
    Route::get('Attendance/Calendar', [AdminController::class, 'ShowCalendar']);
    Route::get('Attendance/Schedule', [AttendanceCreate::class, 'ListSchedule']);
    Route::post('Attendance/Schedule', [AttendanceCreate::class, 'CreateSchedule']);
    Route::get('Attendance/Location', [AttendanceCreate::class, 'ListLocation']);
    Route::post('Attendance/Location', [AttendanceCreate::class, 'CreateLocation']);
    Route::resource('Attendance/Log', Logs::class);

    Route::get('Leave', [AdminController::class, 'ShowLeave']);
    Route::get('Leave/Create', [LeaveCreate::class, 'LeaveCreate']);
    Route::post('Leave/Create', [LeaveCreate::class, 'LeaveStore']);

    Route::get('Auditlog', [AuditLogController::class, 'index']);
});


// ===================================================================
Route::get('/Dashboard', [EmployeeUserEmployee::class, 'EmployeeDashboard']);
Route::get('/Profile', [UserController::class, 'Profile']);
Route::get('/trial', [AdminController::class, 'trial']);

// ==========================================================
Route::get('/Attendance', [EmployeeUserEmployee::class, 'Attendance']);
Route::post('/Attendance', [EmployeeUserEmployee::class, 'AttendanceLogIn']);
Route::put('/Attendance', [EmployeeUserEmployee::class, 'AttendanceLogOut']);
Route::post('/Schedule/{id}', [EmployeeUserEmployee::class, 'getschedule']);
Route::put('/Schedule/{id}', [EmployeeUserEmployee::class, 'requestschedule']);
// ==========================================================

Route::resource('/Leave', LeaveController::class);

Route::get('/run-migration', function () {
    Artisan::call('optimize:clear');
    Artisan::call('migrate:refresh --seed');
    return "Migrations executed successfully";
});
