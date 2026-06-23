<!DOCTYPE html>

<html>
<head>
    <title>Forgot Password</title>

```
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

    body{
        background: linear-gradient(135deg,#0f4c81,#1e3c72,#2a5298);
        min-height:100vh;
        display:flex;
        justify-content:center;
        align-items:center;
    }

    .forgot-card{
        width:550px;
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

    .btn{
        width:100%;
    }

</style>
```

</head>

<body>

<div class="forgot-card">

```
<h2>Forgot Password</h2>

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

<!-- Send OTP -->

<form method="POST" action="/forgot-password">

    @csrf

    <label>
        Email or Phone
        <span class="required">*</span>
    </label>

    <input type="text"
           name="login"
           class="form-control"
           placeholder="Enter Email or Phone"
           required>

    <br>

    <button type="submit"
            class="btn btn-primary">
        Send OTP
    </button>

</form>

<hr>

<!-- Verify OTP -->

<form method="POST"
      action="/verify-reset-otp">

    @csrf

    <label>
        Enter OTP
        <span class="required">*</span>
    </label>

    <input type="text"
           name="otp"
           class="form-control"
           maxlength="6"
           placeholder="Enter OTP"
           required>

    <br>

    <button type="submit"
            class="btn btn-success">
        Verify OTP
    </button>

</form>

<br>

<!-- Resend OTP -->

<form method="POST"
      action="/resend-reset-otp">

    @csrf

    <button type="submit"
            class="btn btn-warning">
        Resend OTP
    </button>

</form>

<hr>

<div class="text-center">

    <a href="/login">
        Back to Login
    </a>

</div>
```

</div>

</body>
</html>
