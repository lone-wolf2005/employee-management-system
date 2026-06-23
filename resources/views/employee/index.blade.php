<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>
</head>
<body>

<h1>Employee Management System</h1>

<a href="/employees/create">Add Employee</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>Employee ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Department</th>
        <th>Designation</th>
        <th>Salary</th>
        <th>Joining Date</th>
    </tr>

    @foreach($employees as $employee)
    <tr>
        <td>{{ $employee->employee_id }}</td>
        <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
        <td>{{ $employee->email }}</td>
        <td>{{ $employee->phone }}</td>
        <td>{{ $employee->department }}</td>
        <td>{{ $employee->designation }}</td>
        <td>{{ $employee->salary }}</td>
        <td>{{ $employee->joining_date }}</td>
    </tr>
    @endforeach

</table>

</body>
</html>