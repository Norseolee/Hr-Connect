<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class BaseController extends Controller
{
    protected $employee;

    public function __construct()
    {
        $this->middleware('web');

        $this->middleware(function ($request, $next) {
            $employee_id = $request->session()->get('employee_id');

            if ($employee_id) {
                $employee_picture = Employee::query()
                    ->select('*')
                    ->where('employee_id', '=', $employee_id)
                    ->first();

                view()->share('employee_id', $employee_id);
                view()->share('employee_picture', $employee_picture);
            }

            return $next($request);
        });
    }
}
