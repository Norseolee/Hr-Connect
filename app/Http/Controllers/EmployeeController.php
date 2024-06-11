<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Department;
use App\Models\EmployeeDoc;
use App\Models\Workschedule;
use Illuminate\Http\Request;
use App\Models\EmployeeNotify;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use App\Models\EmployeeInformation;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::query()
            ->with("user")
            ->filter(request(['search']))
            ->paginate(10);

        return view('AdminEmployee.Employee', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::query()
            ->select('positions.*', 'employees.*', 'departments.*', 'employee_docs.*', 'employee_informations.*', 'employee_notifies.*')
            ->join('positions', 'positions.position_id', '=', 'employees.position_id')
            ->join('departments', 'departments.department_id', '=', 'departments.department_id')
            ->join('employee_docs', 'employee_docs.employee_id', '=', 'employees.employee_id')
            ->join('employee_informations', 'employee_informations.employee_id', '=', 'employees.employee_id')
            ->join('employee_notifies', 'employee_notifies.employee_id', '=', 'employees.employee_id')
            ->get();
        $position = Position::all();
        $department = Department::all();
        $schedule = Workschedule::all();

        return view('AdminEmployee.AddEmployee', compact('schedule', 'employees', 'position', 'department'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'sss' => 'nullable|numeric|digits:10',
            'tin' => 'nullable|numeric|digits:9',
            'philhealth' => 'nullable|numeric|digits:12',
            'hdmf' => 'nullable|numeric|digits:12',
        ]);


        $newemployee = new Employee();

        $newemployee->title = $request->input('title');
        $newemployee->first_name = $request->input('first_name');
        $newemployee->last_name = $request->input('last_name');
        $newemployee->middle_name = $request->input('middle_name');
        $newemployee->maiden_name = $request->input('maiden_name');
        $newemployee->nick_name = $request->input('nick_name');
        $newemployee->position_id = $request->input('position_id');
        $newemployee->department_id = $request->input('department_id');
        $newemployee->hire_date = $request->input('hire_date');
        $newemployee->salary = $request->input('salary');
        $newemployee->schedule_id = $request->input('schedule_id');
        $newemployee->employee_status = 'Added';

        if ($request->file('picture')) {
            $file = $request->file('picture');
            $filename = date('YmdHiu') . $file->getClientOriginalName();
            $file->move(public_path('img/user_profiles'), $filename);
            $newemployee->picture = $filename;
        }

        $newemployee->save();

        $newemployeedoc = new EmployeeDoc();
        $newemployeedoc->employee_id = $newemployee->employee_id;
        $newemployeedoc->sss = $request->input('sss');
        $newemployeedoc->tin = $request->input('tin');
        $newemployeedoc->philhealth = $request->input('philhealth');
        $newemployeedoc->hdmf = $request->input('hdmf');

        $newemployeedoc->save();

        $newemployeeinformation = new EmployeeInformation();
        $newemployeeinformation->employee_id = $newemployee->employee_id;
        $newemployeeinformation->date_of_birth = $request->input('date_of_birth');
        $newemployeeinformation->place_of_birth = $request->input('place_of_birth');
        $newemployeeinformation->nationality = $request->input('nationality');
        $newemployeeinformation->civil_status = $request->input('civil_status');
        $newemployeeinformation->mobile_no = $request->input('mobile_no');
        $newemployeeinformation->email_address = $request->input('email');
        $newemployeeinformation->zip = $request->input('zip');
        $newemployeeinformation->street = $request->input('street');
        $newemployeeinformation->city = $request->input('city');
        $newemployeeinformation->province = $request->input('province');
        $newemployeeinformation->phone_no = $request->input('phone_no');
        $newemployeeinformation->gender = $request->input('gender');

        $newemployeeinformation->save();

        $newemployeenotifies = new EmployeeNotify();
        $newemployeenotifies->employee_id = $newemployee->employee_id;
        $newemployeenotifies->name = $request->input('name');
        $newemployeenotifies->relationship = $request->input('relationship');
        $newemployeenotifies->mobile_no = $request->input('mobile_no_contact');
        $newemployeenotifies->address = $request->input('address_contact');

        $newemployeenotifies->save();
        return redirect('/Admin/Employee')->with('success', 'New Employee added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::query()
            ->where('employee_id', $id)
            ->first();

        $employeedoc = EmployeeDoc::query()
            ->where('employee_id', $id)
            ->first();

        $employeeinformation = EmployeeInformation::query()
            ->where('employee_id', $id)
            ->first();

        $employeenotify = EmployeeNotify::query()
            ->where('employee_id', $id)
            ->first();


        $position = Position::query()
            ->select('employees.*', 'positions.*')
            ->join('employees', 'employees.position_id', '=', 'positions.position_id')
            ->where('employees.employee_id', $id)
            ->first();

        $department = Department::query()
            ->select('departments.*', 'employees.*')
            ->join('employees', 'employees.department_id', '=', 'departments.department_id')
            ->where('employee_id', $id)
            ->first();

        $positionlist = Position::all();
        $departmentlist = Department::all();
        return view('AdminEmployee.ShowEmployee', compact('departmentlist', 'positionlist', 'employee', 'position', 'department', 'employeedoc', 'employeeinformation', 'employeenotify'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {


        // get the ID
        $employee = Employee::query()
            ->where('employee_id', $id)
            ->first();
        $employeedoc = EmployeeDoc::query()
            ->where('employee_id', $id)
            ->first();
        $employeeinformation = EmployeeInformation::query()
            ->where('employee_id', $id)
            ->first();
        $employeenotify = EmployeeNotify::query()
            ->where('employee_id', $id)
            ->first();

        $position = Position::query()
            ->select('employees.*', 'positions.*')
            ->join('employees', 'employees.position_id', '=', 'positions.position_id')
            ->where('employees.employee_id', $id)
            ->first();

        $department = Department::query()
            ->select('departments.*', 'employees.*')
            ->join('employees', 'employees.department_id', '=', 'departments.department_id')
            ->where('employee_id', $id)
            ->first();

        $positionlist = Position::all();
        $departmentlist = Department::all();
        return view('AdminEmployee.EditEmployee', compact('departmentlist', 'positionlist', 'employee', 'position', 'department', 'employeedoc', 'employeeinformation', 'employeenotify'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $employee = Employee::find($id);

        $employee->update($request->all());

        if ($request->has('department_id') && $request->filled('department_id')) {
            $department = Department::find($request->input('department_id'));
            if ($department) {
                $employee->department_id = $request->input('department_id');
            }
        }
        if ($request->has('position_id') && $request->filled('position_id')) {
            $position = Position::find($request->input('position_id'));
            if ($position) {
                $employee->position_id = $request->input("position_id");
            }
        }
        if ($request->has('salary') && $request->filled('salary')) {
            $employee->salary = $request->input('salary');
        }
        if ($request->file('picture')) {
            if ($employee->picture) {
                $picturePath = public_path('img/user_profiles/') . $employee->picture;
                if (file_exists($picturePath)) {
                    unlink($picturePath);
                }
            }

            $file = $request->file('picture');
            $filename = date('YmdHiu') . $file->getClientOriginalName();
            $file->move(public_path('img/user_profiles'), $filename);
            $employee->picture = $filename;
        }

        $employee->save();

        $employeeinformation = EmployeeInformation::find($id);

        $employeeinformation = EmployeeInformation::find($id);
        if ($employeeinformation) {
            $employeeinformation->update($request->all());
        }


        $employeenotify = EmployeeNotify::find($id);
        if ($employeenotify) {
            $employeenotify->update($request->all());
        }

        $employeedoc = EmployeeDoc::find($id);
        if ($employeedoc) {
            $employeedoc->update($request->all());
        }


        return redirect("/Admin/Employee/{$id}")->with('Success', 'Successfully Edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delemployee = Employee::find($id);


        $delemployeedoc = EmployeeDoc::find($id);
        $delemployeedoc->employee_id = $delemployee->employee_id;


        $delemployeeinformation = EmployeeInformation::find($id);
        $delemployeeinformation->employee_id = $delemployee->employee_id;


        $delemployeenotify = EmployeeNotify::find($id);
        $delemployeenotify->employee_id = $delemployee->employee_id;

        if ($delemployee) {
            $employeeName = $delemployee->nick_name;
            $delemployee->update(['employee_status' => 'Deleted']);
            $delemployee->delete();
            $delemployeedoc->delete();
            $delemployeeinformation->delete();
            $delemployeenotify->delete();
            return redirect('/Admin/Employee')->with('success', $employeeName . ' is successfully deleted!');
        }
        return redirect('/Admin/Employee')->with('error', 'Department not found!');
    }
}
