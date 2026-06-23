<!DOCTYPE html>
<html>
<head>
    <title>Add Employee</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
        }

        .container-box{
            max-width:800px;
            margin:40px auto;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0px 2px 10px rgba(0,0,0,0.1);
        }

        .required{
            color:red;
        }
    </style>
</head>
<body>

<div class="container-box">

    <h2 class="mb-4">Add Employee</h2>

    <form method="POST" action="/employee">

        @csrf

        <div class="row">

            <div class="col-md-6">
                <label>
                    Employee ID
                    <span class="required">*</span>
                </label>

                <input type="text"
                       name="employee_id"
                       class="form-control"
                       required>
            </div>

            <div class="col-md-6">
                <label>
                    Joining Date
                    <span class="required">*</span>
                </label>

                <input type="date"
                       name="joining_date"
                       class="form-control"
                       required>
            </div>

        </div>

        <br>

        <div class="row">

            <div class="col-md-6">
                <label>
                    First Name
                    <span class="required">*</span>
                </label>

                <input type="text"
                       name="first_name"
                       class="form-control"
                       required>
            </div>

            <div class="col-md-6">
                <label>
                    Last Name
                    <span class="required">*</span>
                </label>

                <input type="text"
                       name="last_name"
                       class="form-control"
                       required>
            </div>

        </div>

        <br>

        <label>
            Email
            <span class="required">*</span>
        </label>

        <input type="email"
               name="email"
               class="form-control"
               required>

        <br>

        <label>
            Phone
            <span class="required">*</span>
        </label>

        <input type="text"
               name="phone"
               class="form-control"
               required>

        <br>

        <div class="row">

            <div class="col-md-6">

                <label>
                    Department
                    <span class="required">*</span>
                </label>

                <select name="department"
                        class="form-control"
                        required>

                    <option value="">Select Department</option>

                    <option>IT</option>
                    <option>HR</option>
                    <option>Finance</option>
                    <option>Marketing</option>
                    <option>Sales</option>

                </select>

            </div>

            <div class="col-md-6">

                <label>
                    Designation
                    <span class="required">*</span>
                </label>

                <input type="text"
                       name="designation"
                       class="form-control"
                       required>

            </div>

        </div>

        <br>

        <label>
            Salary
            <span class="required">*</span>
        </label>

        <input type="number"
               name="salary"
               class="form-control"
               required>

        <br>

        <button type="submit"
                class="btn btn-success">
            Save Employee
        </button>

        <a href="/employee"
           class="btn btn-secondary">
            Back
        </a>

    </form>

</div>

</body>
</html>