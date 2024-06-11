<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Workschedule;
use Illuminate\Http\Request;

class Logs extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendance = Attendance::all();
        $employee = Employee::all();
        $locations = Location::all();
        return view('AdminAttendance.Loglist', compact('employee', 'locations', 'attendance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee = Employee::all();
        $locations = Location::all();
        return view('AdminAttendance.AttendanceLogIn', compact('employee', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employee = Employee::where('employee_id', $request->input('employee_id'))->first();
        $schedule_id = $employee->schedule_id;
        $workschedule = Workschedule::where('schedule_id', $schedule_id)->first();

        $existingAttendance = Attendance::where('employee_id', $employee->employee_id)
            ->where('attendance_date', today())
            ->first();

        if ($existingAttendance) {
            return redirect()->back()->with('fail', "$employee->first_name $employee->last_name has already logged in today.");
        }

        $start_time = $workschedule->start_time;
        $login_time = now();

        $time_difference = $login_time->diffInMinutes($start_time);
        $sign = ($time_difference < 0) ? '+' : '-';
        $minutes = abs($time_difference);
        $time_difference_formatted = $sign . $minutes;

        $max_early_late_log_in = 180;

        if ($time_difference_formatted < -$max_early_late_log_in) {
            return redirect()->back()->with('fail', "Cannot log in. You are too early.");
        } elseif ($time_difference_formatted > $max_early_late_log_in) {
            return redirect()->back()->with("fail", "Cannot log in. You are too late.");
        }

        $attendance = new Attendance;
        $attendance->location_id = $request->input('location_id');
        $attendance->employee_id = $request->input('employee_id');
        $attendance->attendance_date = today();
        $attendance->in_time = $login_time;

        $acceptable_early_late_minutes = 10;

        if ($time_difference_formatted < -$acceptable_early_late_minutes) {
            $attendance->in_status = "Early In";
        } elseif ($time_difference_formatted >= -$acceptable_early_late_minutes && $time_difference_formatted <= $acceptable_early_late_minutes) {
            $attendance->in_status = "In-Time";
        } elseif ($time_difference_formatted > $acceptable_early_late_minutes) {
            $attendance->in_status = "Late";
        }

        $attendance->save();

        return redirect('/Admin/Attendance/Log')->with('success', 'successfully LogIn, Your ' . $attendance->in_status);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attendance = Attendance::find($id);
        $employee = Employee::all();
        $locations = Location::all();
        return view('AdminAttendance.AttendanceLogOut', compact('employee', 'locations', 'attendance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $attendance = Attendance::find($id);
        $employeeId = $attendance->employee_id;
        $employee = Employee::find($employeeId);

        $schedule_id = $employee->schedule_id;
        $workschedule = Workschedule::where('schedule_id', $schedule_id)->first();
        $end_time = $workschedule->end_time;
        $logout_time = now();
        $time_difference = $logout_time->diffInMinutes($end_time);
        $sign = ($time_difference < 0) ? '+' : '-';
        $minutes = abs($time_difference);
        $time_difference_formatted = $sign . $minutes;

        $max_early_late_log_out = 180;

        if ($time_difference_formatted > -$max_early_late_log_out) {
            return redirect()->back()->with('fail', "Unable to log out. Please note that the minimum time to log out is 3 hours before the scheduled log-out time.");
        }

        $attendance->out_time = $logout_time;

        if ($time_difference_formatted < -60) {
            $attendance->out_status = "Early Out";
        } elseif ($time_difference_formatted <= -10 && $time_difference_formatted >= -10) {
            $attendance->out_status = "Out-Time";
        } elseif ($time_difference_formatted >= 30) {
            $attendance->out_status = "Over Time";
        }

        $attendance->save();

        return redirect('/Admin/Attendance/Log')->with('success', 'Successfully Logged out, Your ' . $attendance->out_status);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
