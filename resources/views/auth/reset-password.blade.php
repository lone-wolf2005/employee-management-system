<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#0f4c81,#1e3c72,#2a5298);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .reset-card{
            width:500px;
            background:white;
            border-radius:15px;
            padding:35px;
            box-shadow:0 0 20px rgba(0,0,0,0.2);
        }

        h2{
            text-align:center;
            margin-bottom:25px;
        }

        .required{
            color:red;
        }

        #error{
            color:red;
            display:none;
        }
    </style>
</head>
<body>

<div class="reset-card">

    <h2>Create New Password</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/reset-password">

        @csrf

        <label>
            New Password
            <span class="required">*</span>
        </label>

        <input type="password"
               name="password"
               id="password"
               class="form-control"
               required>

        <br>

        <label>
            Confirm Password
            <span class="required">*</span>
        </label>

        <input type="password"
               name="password_confirmation"
               id="confirmPassword"
               class="form-control"
               required>

        <small id="error">
            Passwords do not match
        </small>

        <br><br>

        <button type="submit"
                class="btn btn-success w-100"
                id="btnReset">
            Reset Password
        </button>

    </form>

</div>

<script>

const password =
document.getElementById('password');

const confirmPassword =
document.getElementById('confirmPassword');

const error =
document.getElementById('error');

const btn =
document.getElementById('btnReset');

function checkPassword()
{
    if(password.value !== confirmPassword.value)
    {
        error.style.display = 'block';
        btn.disabled = true;
    }
    else
    {
        error.style.display = 'none';
        btn.disabled = false;
    }
}

password.addEventListener('keyup',checkPassword);
confirmPassword.addEventListener('keyup',checkPassword);

</script>

</body>
</html>