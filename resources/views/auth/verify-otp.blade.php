<!DOCTYPE html>
<html>
<head>
    <title>OTP Verification</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background: linear-gradient(135deg,#0f4c81,#1e3c72,#2a5298);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .otp-card{
            width:450px;
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

        .otp-box{
            text-align:center;
            font-size:24px;
            letter-spacing:5px;
        }

    </style>

</head>
<body>

<div class="otp-card">

    <h2>OTP Verification</h2>

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

    <form method="POST" action="/verify-otp">

        @csrf

        <label>
            Enter OTP
            <span class="required">*</span>
        </label>

        <input type="text"
               name="otp"
               maxlength="6"
               class="form-control otp-box"
               placeholder="000000"
               required>

        <br>

        <button type="submit"
                class="btn btn-success w-100">

            Verify OTP

        </button>

    </form>

    <br>

    <button
        class="btn btn-warning w-100"
        id="resendBtn"
        disabled>

        Resend OTP (30)

    </button>

    <div class="text-center mt-3">

        <small id="timerText">

            You can resend OTP after 30 seconds

        </small>

    </div>

</div>

<script>

let timeLeft = 30;

let resendBtn = document.getElementById('resendBtn');

let timerText = document.getElementById('timerText');

let timer = setInterval(function(){

    timeLeft--;

    resendBtn.innerHTML =
        "Resend OTP (" + timeLeft + ")";

    if(timeLeft <= 0){

        clearInterval(timer);

        resendBtn.disabled = false;

        resendBtn.innerHTML = "Resend OTP";

        timerText.innerHTML =
            "OTP expired? Click Resend OTP";

    }

},1000);

resendBtn.addEventListener('click', function(){

    window.location.href = "/resend-otp";

});

</script>

</body>
</html>