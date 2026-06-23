<!DOCTYPE html>

<html>
<head>
    <title>Admin Dashboard</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

    body{
        background:#f4f6f9;
    }

    .top-bar{
        background:linear-gradient(135deg,#0d6efd,#1e3c72);
        color:white;
        padding:20px;
        border-radius:15px;
        margin-bottom:20px;
    }

    .card-box{
        background:white;
        border-radius:15px;
        padding:20px;
        box-shadow:0px 2px 10px rgba(0,0,0,0.1);
        margin-bottom:20px;
    }

    .table-container{
        background:white;
        padding:20px;
        border-radius:15px;
        box-shadow:0px 2px 10px rgba(0,0,0,0.1);
    }

    .employee-count{
        font-size:32px;
        font-weight:bold;
        color:#0d6efd;
    }

</style>


</head>
<body>

<div class="container mt-4">


<div class="top-bar">

    <div class="d-flex justify-content-between align-items-center">

        <div>
            <h2>Admin Dashboard</h2>
            <p class="mb-0">Employee Management System</p>
        </div>

        <a href="/logout"
           class="btn btn-danger">
            Logout
        </a>

    </div>

</div>

<div class="row">

    <div class="col-md-4">

        <div class="card-box text-center">

            <h5>Total Employees</h5>

            <div class="employee-count">
                {{ count($employees) }}
            </div>

        </div>

    </div>

    <div class="col-md-8">

        <div class="card-box">

            <div class="d-flex justify-content-between">

                <form method="GET"
                      action="/admin/dashboard"
                      class="d-flex">

                    <input type="text"
                           name="search"
                           class="form-control me-2"
                           placeholder="Search Employee Code"
                           value="{{ $search ?? '' }}">

                    <button type="submit"
                            class="btn btn-primary">
                        Search
                    </button>

                </form>

                <a href="/register"
                   class="btn btn-success">
                    Add Employee
                </a>

            </div>

        </div>

    </div>

</div>

<div class="table-container">

    <h4 class="mb-3">Employee List</h4>

    <table class="table table-hover table-bordered">

        <thead class="table-dark">

        <tr>
            <th>Emp No</th>
            <th>Employee Code</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Salary</th>
            <th>Action</th>
        </tr>

        </thead>

        <tbody>

        @foreach($employees as $employee)

        <tr>

            <td>{{ $employee->id }}</td>

            <td>{{ $employee->employee_id }}</td>

            <td>
                {{ $employee->first_name }}
                {{ $employee->last_name }}
            </td>

            <td>{{ $employee->email }}</td>

            <td>{{ $employee->phone }}</td>

            <td>{{ $employee->department }}</td>

            <td>{{ $employee->designation }}</td>

            <td>₹ {{ $employee->salary }}</td>

            <td>

                <a href="/employees/edit/{{ $employee->id }}"
                   class="btn btn-primary btn-sm">
                    Edit
                </a>

                <form action="/employees/{{ $employee->id }}"
                      method="POST"
                      style="display:inline;">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete Employee?')">

                        Delete

                    </button>

                </form>

            </td>

        </tr>

        @endforeach

        </tbody>

    </table>

</div>


</div>

</body>
</html>
