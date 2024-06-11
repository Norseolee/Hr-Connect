<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Workschedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeUserEmployee extends BaseController
{
    public function EmployeeDashboard(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $employee_id = $user->employee_id;
            $employee = Employee::with(['attendance', 'workschedule'])
                ->where('employee_id', $employee_id)
                ->first();
            $locations = Location::all();

            return view('Employee.Dashboard', compact('employee', 'locations'));
        }
    }

    public function Attendance()
    {
        $user = Auth::user();

        if ($user) {
            $employee_id = $user->employee_id;
            $employee = Employee::with(['attendance', 'workschedule'])
                ->where('employee_id', $employee_id)
                ->first();

            if ($employee) {
                $attendance = $employee->attendance;
                $schedule = $employee->workschedule;
                $workschedule = Workschedule::all();
                $locations = Location::all();

                return view('Employee.Attendance', compact('employee', 'attendance', 'locations', 'schedule', 'workschedule'));
            }
        }

        return redirect('/')->with('fail', 'Employee not found.');
    }

    public function AttendanceLogIn(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $employee = Employee::where('employee_id', $user->employee_id)
                ->with('attendance')
                ->first();

            if ($employee) {
                $existingAttendance = Attendance::where('employee_id', $employee->employee_id)
                    ->where('attendance_date', today())
                    ->first();

                if ($existingAttendance) {
                    return redirect()->back()->with('fail', "You has already logged in today.");
                }
                $schedule_id = $employee->schedule_id;
                $workschedule = Workschedule::where('schedule_id', $schedule_id)->first();
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
                $attendance->employee_id = $user->employee_id;
                $attendance->attendance_date = now();

                $acceptable_early_late_minutes = 10;

                if ($time_difference_formatted < -$acceptable_early_late_minutes) {
                    $attendance->in_status = "Early In";
                } elseif ($time_difference_formatted >= -$acceptable_early_late_minutes && $time_difference_formatted <= $acceptable_early_late_minutes) {
                    $attendance->in_status = "In-Time";
                } elseif ($time_difference_formatted > $acceptable_early_late_minutes) {
                    $attendance->in_status = "Late";
                }

                $attendance->save();

                return redirect('/Attendance')->with('success', 'successfully LogIn, Your ' . $attendance->in_status);
            }
        }

        return redirect('/')->with('fail', 'Employee not found.');
    }

    public function AttendanceLogOut()
    {
        $user = Auth::user();
        if ($user) {
            $employee = Employee::where('employee_id', $user->employee_id)->first();

            $existingAttendance = Attendance::where('employee_id', $user->employee_id)
                ->whereDate('attendance_date', today())
                ->whereNotNull('in_status')
                ->whereNotNull('out_time')
                ->first();

            if ($existingAttendance) {
                return redirect()->back()->with('fail', "You have already logged out.");
            }

            $attendance = Attendance::where('employee_id', $user->employee_id)
                ->whereDate('attendance_date', today())
                ->first();
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
        }
        return redirect('/Attendance')->with('success', 'Successfully Logged Out, Your ' . $attendance->out_status);
    }

    public function getschedule(Request $request, string $id)
    {
        $request->validate([
            'selectschedule' => 'required',
        ]);

        $user = Auth::user();
        if ($user) {
            $employee = Employee::where('employee_id', $user->employee_id)->first();

            if ($employee) {
                $employee->update([
                    'schedule_id' => $request->input('selectschedule'),
                ]);

                return redirect('/Schedule')->with('success', 'You successfully selected your schedule!');
            }
        }

        return redirect()->back()->with('fail', 'Unable to update schedule. Please try again.');
    }

    public function requestschedule(Request $request, string $id)
    {
        $user = Auth::user();
        if ($user) {
            $employee = Employee::where('employee_id', $user->employee_id)->first();

            if ($employee) {
                return redirect('/Schedule')->with('info', 'THIS IS NOT PART OF OUR DEMO!');
            }
        }

        return redirect()->back()->with('fail', 'Unable to update schedule. Please try again.');
    }
}
