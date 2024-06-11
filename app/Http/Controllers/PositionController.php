<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Department;
use Illuminate\Http\Request;

class PositionController extends BaseController
{

    // Show the Organization
    public function index()
    {
        return view('AdminOrganization.Organization');
    }


    // get New Position with Department set
    public function create()
    {
        $department = Department::all();
        $positionlist = Position::query()
            ->select('positions.*', 'departments.*')
            ->join('departments', 'departments.department_id', '=', 'positions.department_id')
            ->orderByDesc('positions.position_id')
            ->get();

        return view('AdminOrganization.AddPosition', compact('positionlist', 'department'));
    }

    // Store New position with Department set
    public function store(Request $request)
    {
        $newposition = new Position();
        $newposition->position_name = $request->input('position_name');
        $newposition->position_status = $request->input('position_status');
        $newposition->department_id = $request->input('department_id');
        $newposition->save();

        return redirect('Admin/Organization')->with('success', 'Position added successfully!');
    }


    // Show Position List
    public function show(string $id)
    {
        $position = Position::query()
            ->select('*')
            ->where('position_id', $id)
            ->first();
        $employee = Employee::query()
            ->select('employees.*', 'positions.*', 'departments.*')
            ->join('positions', 'positions.position_id', 'employees.position_id')
            ->join('departments', 'departments.department_id', 'positions.department_id')
            ->where('employees.position_id', $id)
            ->filter(request(['search']))
            ->get();
        $department = Department::query()
            ->select('departments.*', 'positions.*')
            ->join('positions', 'departments.department_id', '=', 'positions.department_id')
            ->where('positions.position_id', $id)
            ->get();

        return view('AdminOrganization.ShowPosition', compact('employee', 'position', 'department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $position = Position::query()
            ->select('positions.*', 'departments.*')
            ->join('departments', 'departments.department_id', '=', 'positions.department_id')
            ->where('positions.position_id', '=', $id)
            ->first();
        // $position = Position::query()
        //     ->select('*')
        //     ->where('position_id', $id)
        //     ->first();
        $departments = Department::all();
        $employee = Employee::query()
            ->select('*')
            ->where('position_id', '=', $id)
            ->get();

        return view('AdminOrganization.EditPosition', compact('position', 'departments', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $position = Position::findOrFail($id);
        $position->update([
            'position_name' => $request->input('new_position_name'),
            'department_id' => $request->input('department_id'),
            'position_status' => $request->input('position_status')
        ]);

        return redirect('/Admin/Organization')->with('Success', 'Successfully Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $position = Position::find($id);

        if ($position) {
            $positionname = $position->position_name;

            $position->update(['position_status' => 'Deleted']);
            $position->delete();

            return redirect('/Admin/Organization')->with('success', $positionname . ' is successfully deleted!');
        }

        return redirect('Admin/Organization')->with('error', 'Position not found!');
    }
}
