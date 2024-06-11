<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveCreate extends BaseController
{
    public function LeaveCreate()
    {
        $leave = LeaveType::all();
        return view('AdminLeave.CreateLeave', compact('leave'));
    }
    public function LeaveStore(Request $request)
    {
        $newLeave = new LeaveType;
        $newLeave->leave_type_name = $request->input('leave_type_name');
        $newLeave->save();

        return redirect('/Admin/Leave/Create')->with('success', 'Leave Type Successfully Created!');
    }
}
