<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        return view(
            'employees.index',
            compact('employees')
        );
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store(Request $request)
    {
        Employee::create([
            'employee_id' => $request->employee_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'department' => $request->department,
            'designation' => $request->designation,
            'salary' => $request->salary,
            'joining_date' => $request->joining_date,
        ]);

        return redirect('/employees');
    }

    public function adminDashboard(Request $request)
{
    $search = $request->search;

    $employees = Employee::when($search, function ($query) use ($search) {
        return $query->where('employee_id', 'like', "%{$search}%");
    })->get();

    return view('admin.dashboard', compact('employees', 'search'));
}

    public function employeeDashboard()
    {
        $user = Auth::user();

        $employee = Employee::where(
            'email',
            $user->email
        )->first();

        return view(
            'employee.dashboard',
            compact('employee')
        );
    }
    public function destroy($id)
{
    $employee = Employee::find($id);

    if ($employee) {
        $employee->delete();
    }

    return redirect('/admin/dashboard')
        ->with('success', 'Employee deleted successfully');
}
public function editProfile()
{
    $user = Auth::user();

    $employee = Employee::where(
        'email',
        $user->email
    )->first();

    return view(
        'employee.edit-profile',
        compact('employee')
    );
}

public function updateProfile(Request $request)
{
    $user = Auth::user();

    $employee = Employee::where(
        'email',
        $user->email
    )->first();

    $employee->first_name = $request->first_name;
    $employee->last_name = $request->last_name;
    $employee->phone = $request->phone;
    $employee->dob = $request->dob;
    $employee->salary = $request->salary;
    $employee->address = $request->address;

    $employee->save();

    return redirect('/employee/dashboard')
        ->with(
            'success',
            'Profile Updated Successfully'
        );
}
public function edit($id)
{
    $employee = Employee::findOrFail($id);

    return view('employee.edit', compact('employee'));
}

public function update(Request $request, $id)
{
    $employee = Employee::findOrFail($id);

    $employee->employee_id = $request->employee_id;
    $employee->first_name = $request->first_name;
    $employee->last_name = $request->last_name;
    $employee->email = $request->email;
    $employee->phone = $request->phone;
    $employee->department = $request->department;
    $employee->salary = $request->salary;
    $employee->dob = $request->dob;

    $employee->save();

    return redirect('/admin/dashboard')
        ->with('success', 'Employee Updated Successfully');
}


public function uploadFiles(Request $request)
{
    $request->validate([
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'id_card' => 'nullable|mimes:jpg,jpeg,png,pdf|max:4096'
    ]);

    $user = Auth::user();

    $employee = Employee::where(
        'email',
        $user->email
    )->first();

    if (!$employee)
    {
        return back()->with(
            'error',
            'Employee not found'
        );
    }

    if ($request->hasFile('photo'))
    {
        $photoPath = $request->file('photo')
                             ->store(
                                 'photos',
                                 'public'
                             );

        $employee->photo = $photoPath;
    }

    if ($request->hasFile('id_card'))
    {
        $idCardPath = $request->file('id_card')
                              ->store(
                                  'idcards',
                                  'public'
                              );

        $employee->id_card = $idCardPath;
    }

    $employee->save();

    return back()->with(
        'success',
        'Files uploaded successfully'
    );
}

}