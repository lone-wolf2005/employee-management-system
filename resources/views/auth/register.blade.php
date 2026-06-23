<!DOCTYPE html>
<html>
<head>
    <title>Employee Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            min-height:100vh;

padding:30px;

overflow-y:auto;

overflow-x:hidden;

display:flex;

justify-content:flex-start;

align-items:flex-start;
}
        #bg-video{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    object-fit:cover;
    z-index:-2;
}

.overlay{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.55);
    z-index:-1;
}


.register-card{

width:700px;

max-width:700px;

margin-left:120px;

padding:30px;

background:rgba(15,23,42,0.35);

backdrop-filter:blur(20px);

-webkit-backdrop-filter:blur(20px);

border:1px solid rgba(255,255,255,0.15);

border-radius:25px;

box-shadow:0 8px 32px rgba(0,0,0,0.4);

color:white;

position:relative;

z-index:10;
}
.register-card h2{
    color:white;
}

label{
    color:white;
}

.form-control,
.form-select{

    background:rgba(255,255,255,0.08);

    border:1px solid rgba(255,255,255,0.15);

    color:white;
}

.form-control::placeholder{
    color:#d1d5db;
}

.form-select option{
    color:black;
}
        

        .required{
            color:red;
        }
        #registerForm{
    opacity:0;
    transform:scale(0.5);
    transition:all 1s ease;
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
        .row{
    margin-bottom:15px;
}

.form-control,
.form-select{
    height:48px;
}

label{
    margin-bottom:6px;
    display:block;
}
        
    </style>
</head>
<body>
<video autoplay muted id="bg-video">
    <source src="/videos/animation5.mp4" type="video/mp4">
</video>

<div class="overlay"></div>
<div class="register-card" id="registerForm">

    <h2>Employee Registration</h2>

    <form method="POST" action="/register" enctype="multipart/form-data">
        @csrf

        <div class="section-title">Personal Information</div>
        <label>
    Employee Code <span style="color:red">*</span>
</label>

<input type="text"
       name="employee_id"
       class="form-control"
       placeholder="Enter Employee Code"
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
                       required>
            </div>
        </div>

        <label>
            Gender
            <span class="required">*</span>
        </label>

        <div class="mb-3">

        <label style="color:white;">
    <input type="radio" name="gender" value="Male">
    Male
</label>

<label style="color:white;">
    <input type="radio" name="gender" value="Female">
    Female
</label>

<label style="color:white;">
    <input type="radio" name="gender" value="Others">
    Others
</label>
<label>Department</label>
<select name="department" class="form-control">
    <option value="IT">IT</option>
    <option value="HR">HR</option>
    <option value="Finance">Finance</option>
</select>

        </div>

        <div class="section-title">Contact Information</div>

        <label>Email Address</label>

        <input type="email"
               class="form-control"
               name="email">

        <label>
            Phone Number
            <span class="required">*</span>
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
               required>

        <label>
            Address
            <span class="required">*</span>
        </label>

        <textarea class="form-control"
                  rows="3"
                  name="address"
                  required></textarea>

        <div class="section-title">Security</div>

        <label>
            Password
            <span class="required">*</span>
        </label>

        <input type="password"
               class="form-control"
               name="password"
               required>

        <label>
            Confirm Password
            <span class="required">*</span>
        </label>

        <input type="password"
               class="form-control"
               name="password_confirmation"
               required>
               <label>Date of Birth <span style="color:red">*</span></label>
               <input type="date"
       name="dob"
       class="form-control"
       required>

<br>

<label>Salary</label>

<input type="number"
       name="salary"
       class="form-control"
       value="0">

        <div class="form-check mt-3">
            <input class="form-check-input"
                   type="checkbox"
                   required>

            <label class="form-check-label">
                I agree to the Terms & Conditions
            </label>
        </div>

        <div class="form-check">
            <input class="form-check-input"
                   type="checkbox"
                   required>

            <label class="form-check-label">
                I agree to the Privacy Policy
            </label>
        </div>

        <button type="submit"
                class="btn btn-primary w-100 mt-4">
            Register
        </button>

        <div class="text-center mt-3">
            <a href="/login">
                Already have an account?
            </a>
        </div>
        



    </form>

</div>
<script>

window.onload = function(){

    setTimeout(function(){

        const form =
            document.getElementById("registerForm");

        form.style.opacity = "1";
        form.style.transform = "scale(1)";

    }, 1500);

};

</script>
</body>
</html>