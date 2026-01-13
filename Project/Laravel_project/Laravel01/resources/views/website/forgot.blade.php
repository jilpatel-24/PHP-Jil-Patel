<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo url('website/img/fav.png')?>">
    <meta charset="UTF-8">
    <title>Forgot Password - Book</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo url('website/css/bootstrap.css')?>">
    <link rel="stylesheet" href="<?php echo url('website/css/main.css')?>">

    <style>
        body {
            background: linear-gradient(135deg, #ffffffff, #fdfdfdff);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }
        .card {
            width: 100%;
            max-width: 800px;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        .card h3 {
            font-weight: 600;
            margin-bottom: 25px;
        }
        .btn-primary {
            background-color: #4b6cb7;
            border: none;
        }
        .btn-primary:hover {
            background-color: #3a56a1;
        }
    </style>
</head>

<body>
@include('sweetalert::alert')
<div class="card bg-white text-dark">
    <h3 class="text-center">Enter Email</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/auth_forgot') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" value="{{ old('email') }}" class="form-control" name="email" placeholder="Enter email">
        </div>

        <button type="submit" class="btn btn-primary w-100 mb-3">
            Send OTP
        </button>
    </form>

    <!-- Login link (NOT submit) -->
    <a href="{{ url('/login') }}" class="btn btn-outline-secondary w-100">
        Back to Login
    </a>
</div>

</body>
</html>
