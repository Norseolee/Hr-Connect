<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartmentController extends BaseController
{
    public function index()
    {
        return view('AdminOrganization.Organization');
    }
    public function create()
    {
        $departmentlist = Department::query()
            ->select('*')
            ->orderbyDesc('department_id')
            ->paginate(10);

        return view('AdminOrganization.AddDepartment', compact('departmentlist'));
    }
    public function store(Request $request)
    {
        $newdepartment = new Department();
        $newdepartment->department_name = $request->input('department_name');
        $newdepartment->department_status = $request->input('department_status');
        $newdepartment->save();

        return redirect("Admin/Organization")->with('success', 'Department added successfully!');
    }
    public function show(string $id)
    {
        $department = Department::query()
            ->select('*')
            ->where('department_id', $id)
            ->first();

        $employee = Employee::query()
            ->select('*', DB::raw('(SELECT position_name FROM positions WHERE positions.position_id = employees.position_id) AS position_name'))
            ->where('department_id', $id)
            ->filter(request(['search']))
            ->get();

        $position = Position::query()
            ->select('positions.*', 'departments.*')
            ->join('departments', 'departments.department_id', '=', 'positions.department_id')
            ->where('positions.department_id', $id)
            ->filter(request(['tag', 'search']))
            ->get();

        return view('AdminOrganization.ShowDepartment', compact('department', 'employee', 'position'));
    }
    public function edit(string $id)
    {
        $department = Department::query()
            ->select('*')
            ->where('department_id', $id)
            ->first();
        return view('AdminOrganization.EditDepartment', compact('department'));
    }
    public function update(Request $request, string $id)
    {
        $department = Department::findOrFail($id);

        $department->update([
            'department_name' => $request->input('new_department_name'),
            'department_status' => $request->input('department_status')
        ]);

        return redirect('Admin/Organization')->with('success', 'Department Updated Successfully!');
    }
    public function destroy(string $id)
    {
        $department = Department::find($id);
        if ($department) {
            $departmentName = $department->department_name;
            $department->update(['department_status' => 'Deleted']);
            $department->delete();
            return redirect('Admin/Organization')->with('success', $departmentName . ' is successfully deleted!');
        }
        return redirect('Admin/Organization')->with('error', 'Department not found!');
    }
}
