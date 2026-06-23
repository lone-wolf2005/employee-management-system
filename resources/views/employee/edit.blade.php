<!DOCTYPE html>
<html>
<head>
    <title>Employee Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#0f4c81,#1e3c72,#2a5298);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:30px;
        }

        .register-card{
            width:700px;
            background:rgba(255,255,255,0.95);
            padding:30px;
            border-radius:15px;
            box-shadow:0 0 20px rgba(0,0,0,0.2);
        }

        .required{
            color:red;
        }

        .form-control,
        .form-select{
            margin-bottom:15px;
        }

        h2{
            text-align:center;
            margin-bottom:25px;
        }

        .section-title{
            font-weight:bold;
            margin-top:10px;
            margin-bottom:10px;
            color:#0d6efd;
        }
    </style>
</head>
<body>

<div class="register-card">

    <h2>Employee Registration</h2>

    <form method="POST" action="/employees/update/{{ $employee->id }}">
    @csrf

        <div class="section-title">Personal Information</div>
        <label>
    Employee Code <span style="color:red">*</span>
</label>

<input type="text"
       name="employee_id"
       class="form-control"
       value="{{ $employee->employee_id }}"
       required>

<br>
        <div class="row">
            <div class="col-md-6">
                <label>
                    First Name
                    <span class="required">*</span>
                </label>

                <input type="text"
       class="form-control"
       name="first_name"
       value="{{ $employee->first_name }}"
       required>
            </div>

            <div class="col-md-6">
                <label>
                    Last Name
                    <span class="required">*</span>
                </label>

                <input type="text"
       class="form-control"
       name="last_name"
       value="{{ $employee->last_name }}"
       required>
            </div>
        </div>

        <label>
            Gender
            <span class="required">*</span>
        </label>

        <input type="radio" name="gender" value="Male"
{{ ($employee->gender ?? '') == 'Male' ? 'checked' : '' }}> Male

<input type="radio" name="gender" value="Female"
{{ ($employee->gender ?? '') == 'Female' ? 'checked' : '' }}> Female

<input type="radio" name="gender" value="Others"
{{ ($employee->gender ?? '') == 'Others' ? 'checked' : '' }}> Others

        <div class="section-title">Contact Information</div>

        <label>Email Address</label>
        <input type="email"
       class="form-control"
       name="email"
       value="{{ $employee->email }}">
        <label>
            Phone Number
            <input type="text"
       class="form-control"
       name="phone"
       value="{{ $employee->phone }}"
       required>
        </label>

        <div class="row">
            <div class="col-3">
                <select name="country_code"
                        class="form-select">

                    <option value="+91" selected>
                        +91 India
                    </option>

                    <option value="+1">
                        +1 USA
                    </option>

                    <option value="+44">
                        +44 UK
                    </option>

                    <option value="+971">
                        +971 UAE
                    </option>

                </select>
            </div>

            <div class="col-9">
                <input type="text"
                       class="form-control"
                       name="phone"
                       placeholder="Enter Phone Number"
                       required>
            </div>
        </div>
        <input type="text"
       name="department"
       value="{{ $employee->department }}"
       class="form-control">

        <div class="section-title">Location Details</div>

        <label>
            Country
            <span class="required">*</span>
        </label>

        <select class="form-select"
                name="country"
                required>

            <option value="">
                Select Country
            </option>

            <option>
                India
            </option>

            <option>
                USA
            </option>

            <option>
                UK
            </option>

            <option>
                UAE
            </option>

        </select>

        <label>
            State
            <span class="required">*</span>
        </label>

        <select class="form-select"
                name="state"
                required>

            <option>
                Select State
            </option>

            <option>
                Tamil Nadu
            </option>

            <option>
                Kerala
            </option>

            <option>
                Karnataka
            </option>

            <option>
                Andhra Pradesh
            </option>

        </select>

        <label>
            District
            <span class="required">*</span>
        </label>

        <select class="form-select"
                name="district"
                required>

            <option>
                Select District
            </option>

            <option>
                Coimbatore
            </option>

            <option>
                Chennai
            </option>

            <option>
                Madurai
            </option>

            <option>
                Salem
            </option>

        </select>

        <label>
            PIN Code
            <span class="required">*</span>
        </label>

        <input type="text"
       class="form-control"
       name="pincode"
       value="{{ $employee->pincode ?? '' }}"
       required>

        <label>
            Address
            <textarea class="form-control"
          rows="3"
          name="address"
          required>{{ $employee->address ?? '' }}</textarea>
        </label>

        

        
               <label>Date of Birth <span style="color:red">*</span></label>
               <input type="date"
       name="dob"
       class="form-control"
       value="{{ $employee->dob }}"
       required>

<br>

<label>Salary</label>

<input type="number"
       name="salary"
       class="form-control"
       value="{{ $employee->salary }}">

        

        <button type="submit"
                class="btn btn-primary w-100 mt-4">
            Update
        </button>

        



    </form>

</div>

</body>
</html>