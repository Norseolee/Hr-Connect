<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuditLogController extends BaseController
{
    public function index()
    {
        if (Auth::user()) {
            $auditlogs = AuditLog::with('user')->get();

            return view('auditlog', [
                'auditlogs' => $auditlogs,
            ]);
        }
    }
}
