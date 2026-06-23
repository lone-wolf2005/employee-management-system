<!DOCTYPE html>

<html>
<head>
    <title>Employee Dashboard</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    min-height:100vh;
    overflow-x:hidden;
    color:white;
}

/* Video Background */

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
    background:rgba(0,0,0,0.82);
    z-index:-1;
}

/* Header */

.header{

    background:rgba(13,110,253,0.15);

    backdrop-filter:blur(15px);

    border:1px solid rgba(255,255,255,0.10);

    color:white;

    padding:20px;

    border-radius:20px;

    margin-bottom:20px;

    box-shadow:0 8px 32px rgba(0,0,0,0.3);
}

/* Main Profile Card */

.profile-card{

background:#0f172a;

border-radius:25px;

padding:40px;

margin-bottom:25px;

box-shadow:0 15px 35px rgba(0,0,0,.35);
}

/* Profile Image */

.profile-img{

    width:130px;

    height:130px;

    border-radius:50%;

    background:rgba(255,255,255,0.10);

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:60px;

    margin:auto;

    border:2px solid rgba(255,255,255,0.15);
}

/* Text */

h2,
h3,
h4,
h5,
p,
span,
td,
th{
    color:white !important;
}

/* Table */

.table{
    color:white !important;
    background:transparent !important;
}

.table td{

    background:rgba(255,255,255,0.03) !important;

    color:white !important;

    border-color:rgba(255,255,255,0.10) !important;
}

.table th{

    background:rgba(255,255,255,0.08) !important;

    color:#38bdf8 !important;

    border-color:rgba(255,255,255,0.10) !important;

    width:250px;
}

/* Badge */

.badge{
    font-size:14px;
    padding:8px 15px;
}

/* Logout Button */

.btn-danger{

    border-radius:10px;

    padding:10px 20px;

    font-weight:bold;
}

/* Hover Effect */

.profile-card:hover{

    transform:translateY(-3px);

    transition:0.3s;
}
.stat-card{

background:linear-gradient(
    135deg,
    #0f172a,
    #1e293b
);

border-radius:25px;

padding:30px;

text-align:center;

min-height:150px;

display:flex;

flex-direction:column;

justify-content:center;

transition:.3s;
}

.stat-card:hover{

transform:translateY(-8px);

border:1px solid #3b82f6;
}
.upload-section{
    margin-top:50px;
}
.upload-card{
    background:linear-gradient(135deg,#0f172a,#1e293b);
    border-radius:25px;
    padding:40px;
    text-align:center;
    border:1px solid rgba(59,130,246,0.2);
    box-shadow:0 15px 35px rgba(0,0,0,0.35);
    transition:0.4s;
}

.upload-card:hover{
    transform:translateY(-8px) scale(1.02);
    border-color:#3b82f6;
}


.upload-icon{
    font-size:70px;
    margin-bottom:20px;
}

.upload-btn{
    background:linear-gradient(135deg,#2563eb,#3b82f6);
    color:white;
    padding:12px 30px;
    border-radius:12px;
    font-weight:600;
    text-decoration:none;
}

.upload-btn:hover{

    background:#1d4ed8;
}

.save-btn{
    background:linear-gradient(135deg,#10b981,#059669);
    color:white;
    border:none;
    padding:14px 40px;
    border-radius:15px;
    font-size:18px;
    font-weight:bold;
}
.info-card{

background:#111827;

border-radius:25px;

padding:35px;

box-shadow:0 15px 35px rgba(0,0,0,.35);
}

.info-row{
    display:grid;
    grid-template-columns:220px 1fr;
    gap:20px;
    align-items:center;
    padding:15px 0;
    border-bottom:1px solid rgba(255,255,255,.08);
}

.info-label{
    color:#60a5fa;
    font-weight:600;
}

.info-value{
    color:white;
    text-align:left;
}

.info-label{
    color:#60a5fa;
    font-weight:600;
}

.info-value{
    color:white;
}
.mini-card{

background:#1e293b;

border-radius:15px;

padding:20px;

height:100%;

border:1px solid rgba(255,255,255,0.08);

transition:0.3s;
}

.mini-card:hover{

transform:translateY(-5px);

border-color:#3b82f6;
}

.mini-card h6{

color:#60a5fa;

margin-bottom:10px;
}

.mini-card p{

color:white;

margin:0;
}
.id-card-box{

background:#1e293b;

border-radius:20px;

padding:25px;

border:1px solid rgba(59,130,246,.3);

text-align:center;

height:180px;

display:flex;

flex-direction:column;

justify-content:center;
}

.id-card-box h4{
color:#3b82f6;
font-weight:bold;
}

.profile-img{
width:150px;
height:150px;
border-radius:50%;
object-fit:cover;
border:4px solid #3b82f6;
}
.container{
    max-width:1200px;
}

</style>


</head>
<body>
<video autoplay muted id="bg-video">
    <source src="/videos/animation3.mp4" type="video/mp4">
</video>

<div class="overlay"></div>

<div class="container mt-4">


<div class="header">

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h2>Employee Dashboard</h2>

            <p class="mb-0">
                Welcome, {{ $employee->first_name }}
            </p>

        </div>

        <a href="/logout"
           class="btn btn-danger">
            Logout
        </a>

    </div>

</div>
<div class="profile-card">

    <div class="row align-items-center">

        <!-- Profile -->

        <div class="col-md-6 text-center">

            @if($employee->photo)
                <img src="{{ asset('storage/'.$employee->photo) }}"
                     class="profile-img mb-3">
            @else
                <div class="profile-img mb-3">👤</div>
            @endif

            <h2>
                {{ $employee->first_name }}
                {{ $employee->last_name }}
            </h2>

            <span class="badge bg-primary">
                {{ $employee->designation }}
            </span>

            <p class="mt-3">
                {{ $employee->department }}
            </p>

            <p>
                {{ $employee->email }}
            </p>

        </div>

        <!-- ID Card -->

        <div class="col-md-6 text-center">

            <h3 class="mb-3">Employee ID Card</h3>

            @if($employee->id_card)

                <img src="{{ asset('storage/'.$employee->id_card) }}"
                     style="
                     width:350px;
                     height:220px;
                     object-fit:cover;
                     border-radius:15px;
                     border:3px solid #3b82f6;
                     ">

            @else

                <div class="id-card-box">
                    No ID Card Uploaded
                </div>

            @endif

        </div>

    </div>

</div>

    







<div class="row mb-4">

    <div class="col-md-4">
        <div class="stat-card">
            <h6>Employee Code</h6>
            <h3>{{ $employee->employee_id }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <h6>Department</h6>
            <h3>{{ $employee->department }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <h6>Salary</h6>
            <h3>₹{{ $employee->salary }}</h3>
        </div>
    </div>

</div>




@if($employee->photo)





@endif

    
<div class="info-card">

<h4 class="mb-4">Employee Information</h4>
<div class="row g-4">

    <div class="col-md-6">
        <div class="mini-card">
            <h6>Email</h6>
            <p>{{ $employee->email }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mini-card">
            <h6>Phone</h6>
            <p>{{ $employee->phone }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mini-card">
            <h6>Department</h6>
            <p>{{ $employee->department }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mini-card">
            <h6>Designation</h6>
            <p>{{ $employee->designation }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mini-card">
            <h6>Employee Code</h6>
            <p>{{ $employee->employee_id }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mini-card">
            <h6>Salary</h6>
            <p>₹ {{ $employee->salary }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mini-card">
            <h6>Date of Birth</h6>
            <p>{{ $employee->dob }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mini-card">
            <h6>Country</h6>
            <p>{{ $employee->country ?? '-' }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mini-card">
            <h6>State</h6>
            <p>{{ $employee->state ?? '-' }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mini-card">
            <h6>District</h6>
            <p>{{ $employee->district ?? '-' }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mini-card">
            <h6>Pincode</h6>
            <p>{{ $employee->pincode ?? '-' }}</p>
        </div>
    </div>

    <div class="col-md-12">
        <div class="mini-card">
            <h6>Address</h6>
            <p>{{ $employee->address ?? '-' }}</p>
        </div>
    </div>



    

</div>

</div>
<form action="/employee/upload-files"
      method="POST"
      enctype="multipart/form-data">

@csrf

<h4>📁 Documents</h4>

<div class="row">

    <div class="col-md-6">
        <div class="upload-card">

            <input type="file"
                   name="photo"
                   id="photo"
                   hidden>

                   <label for="photo" class="upload-btn">
    Choose Photo
</label>
<div id="photoName" class="mt-2 text-light">
    No file selected
</div>

<div id="photoName" class="mt-2 text-light"></div>

        </div>
    </div>

    <div class="col-md-6">
        <div class="upload-card">

            <input type="file"
                   name="id_card"
                   id="id_card"
                   hidden>

            <label for="id_card" class="upload-btn">
                Choose ID Card
            </label>
            <div id="idCardName" class="mt-2 text-light">
    No file selected
</div>

        </div>
    </div>

</div>

<div class="text-center mt-5 mb-5">
    <button type="submit" class="save-btn">
        Upload Documents
    </button>
</div>

</form>
</div>

</div>

<script>
document.getElementById('photo').addEventListener('change', function () {
    if(this.files.length > 0){
        document.getElementById('photoName').innerText =
            this.files[0].name;
    }
});

document.getElementById('id_card').addEventListener('change', function () {
    if(this.files.length > 0){
        document.getElementById('idCardName').innerText =
            this.files[0].name;
    }
});
</script>

</body>

</html>
