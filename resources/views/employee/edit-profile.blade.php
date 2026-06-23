<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Edit Profile</h2>

    <form method="POST" action="/employee/update-profile">

        @csrf

        <label>First Name</label>
        <input type="text"
               name="first_name"
               value="{{ $employee->first_name }}"
               class="form-control">

        <br>

        <label>Last Name</label>
        <input type="text"
               name="last_name"
               value="{{ $employee->last_name }}"
               class="form-control">

        <br>

        <label>Phone</label>
        <input type="text"
               name="phone"
               value="{{ $employee->phone }}"
               class="form-control">

        <br>

        <label>Date of Birth</label>
        <input type="date"
               name="dob"
               value="{{ $employee->dob }}"
               class="form-control">

        <br>

        <label>Salary</label>
        <input type="number"
               name="salary"
               value="{{ $employee->salary }}"
               class="form-control">

        <br>

        <label>Address</label>
        <textarea name="address"
                  class="form-control">{{ $employee->address ?? '' }}</textarea>

        <br>

        <button type="submit"
                class="btn btn-success">
            Update Profile
        </button>

        <a href="/employee/dashboard"
           class="btn btn-secondary">
            Back
        </a>

    </form>

</div>

</body>
</html>