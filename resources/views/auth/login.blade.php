<!DOCTYPE html>
<html>
<head>
    <title>Employee Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

body{
    margin:0;
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    overflow:hidden;
    font-family:'Segoe UI',sans-serif;
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:'Segoe UI',sans-serif;
    overflow:hidden;
}

/* Background Video */
#bg-video{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    object-fit:cover;
    z-index:-2;
}

/* Dark Overlay */
.overlay{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.55);
    z-index:-1;
}

/* Login Card */
.login-card{

    width:600px;

    padding:45px;

    background:rgba(255,255,255,0.08);

    backdrop-filter:blur(20px);

    -webkit-backdrop-filter:blur(20px);

    border:1px solid rgba(255,255,255,0.15);

    border-radius:30px;

    box-shadow:
        0 8px 32px rgba(0,0,0,0.4);

    color:white;

    animation:fadeUp 1s ease;
}

/* Heading */
.login-card h2{

    font-size:50px;

    font-weight:700;

    text-align:center;

    margin-bottom:10px;

    color:white;
}

.subtitle{

    text-align:center;

    color:#d1d5db;

    margin-bottom:35px;

    font-size:16px;
}

/* Labels */
label{

    color:white;

    font-weight:500;

    margin-bottom:8px;
}

/* Inputs */
.form-control{

    height:55px;

    background:rgba(255,255,255,0.08);

    border:1px solid rgba(255,255,255,0.15);

    color:white;

    border-radius:12px;
}

.form-control:focus{

    background:rgba(255,255,255,0.12);

    color:white;

    border-color:#3b82f6;

    box-shadow:0 0 15px rgba(59,130,246,0.5);
}

.form-control::placeholder{
    color:#d1d5db;
}

/* Login Button */
.btn-login{

    width:100%;

    height:55px;

    border:none;

    border-radius:12px;

    font-size:18px;

    font-weight:600;

    background:linear-gradient(
        135deg,
        #2563eb,
        #3b82f6
    );

    transition:0.3s;
}

.btn-login:hover{

    transform:translateY(-2px);

    box-shadow:0 8px 20px rgba(59,130,246,0.5);
}

/* Links */
a{
    color:#60a5fa;
    text-decoration:none;
}

a:hover{
    color:white;
}

/* Divider */
hr{
    border-color:rgba(255,255,255,0.15);
}

/* Checkbox */
.form-check-label{
    color:white;
}

/* Animation */
@keyframes fadeUp{

    from{
        opacity:0;
        transform:translateY(30px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }
}

.required{
    color:#ff4d4d;
}
    </style>

</head>

<body>
<video autoplay muted loop id="bg-video">
    <source src="/videos/animation.mp4" type="video/mp4">
</video>

<div class="overlay"></div>
<div class="login-card">

    <h2>Employee Login</h2>
    <p class="subtitle">
    Employee Management System
</p>

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

    <form method="POST" action="/login">

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

        <label>
            Password
            <span class="required">*</span>
        </label>

        <input type="password"
               name="password"
               class="form-control"
               placeholder="Enter Password"
               required>

        <br>

        <div class="form-check">

            <input class="form-check-input"
                   type="checkbox"
                   id="remember">

            <label class="form-check-label"
                   for="remember">

                Remember Me

            </label>

        </div>

        <br>

        <button type="submit"
        class="btn btn-login">
    Login
</button>

    </form>

    <br>

    <div class="text-center">

        <a href="/forgot-password">
            Forgot Password?
        </a>

    </div>

    <hr>

    <div class="text-center">

        Don't have an account?

        <a href="/register">
            Register
        </a>

    </div>

</div>

</body>
</html>