<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo url('website/img/fav.png') ?>">
    <meta name="author" content="codepixer">
    <meta charset="UTF-8">
    <title>Edit Profile - Book</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo url('website/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?php echo url('website/css/main.css') ?>">

    <style>
        body {
            background: linear-gradient(135deg, #ffffffff, #fcfcfcff);
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
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            font-weight: 600;
            margin-bottom: 25px;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        /* ----------------------- */
        /* Custom Gender Radio CSS */
        /* ----------------------- */
        .custom-radio {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
            cursor: pointer;
        }

        .custom-radio input[type="radio"] {
            appearance: none;
            width: 18px;
            height: 18px;
            border: 2px solid #28a745;
            border-radius: 50%;
            outline: none;
            cursor: pointer;
            position: relative;
            transition: 0.2s;
        }

        .custom-radio input[type="radio"]:checked {
            border-color: #28a745;
        }

        .custom-radio input[type="radio"]::before {
            content: "";
            width: 10px;
            height: 10px;
            background: #28a745;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: 0.2s ease-in-out;
        }

        .custom-radio input[type="radio"]:checked::before {
            transform: translate(-50%, -50%) scale(1);
        }

        .custom-radio label {
            margin: 0;
            font-weight: 500;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="card bg-white text-dark">
        <h3 class="text-center">Edit Profile</h3>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{url('/update_profile/'.$customer->id)}}" enctype="multipart/form-data" method="post">
            @csrf

            <!-- Name -->
            <div class="form-group mb-3">
                <label>Name</label>
                <input type="text" value="{{$customer->name}}" class="form-control" name="name" placeholder="Enter name">
            </div>

            <!-- Email -->
            <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" value="{{$customer->email}}" class="form-control" name="email" placeholder="Enter email">
            </div>

            <!-- Mobile Number -->
            <div class="form-group mb-3">
                <label>Mobile Number</label>
                <input type="text" value="{{$customer->mobile}}" class="form-control" name="mobile" placeholder="Enter mobile number">
            </div>

            <!-- Gender -->
            <div class="form-group mb-3">
                <label>Select Gender</label>
                @php
                $gender=$customer->gender;
                @endphp
                <div class="custom-radio">
                    <input type="radio" name="gender" <?php if ($gender == "Male") { echo "Checked";} ?> value="Male">
                    <label>Male</label>
                </div>

                <div class="custom-radio">
                    <input type="radio" name="gender" <?php if ($gender == "Female") {echo "Checked";} ?> value="Female">
                    <label>Female</label>
                </div>

                <div class="custom-radio">
                    <input type="radio" name="gender" <?php if ($gender == "Other") {echo "Checked";} ?> value="Other">
                    <label>Other</label>
                </div>

            </div>

            <!-- Button -->
            <div class="mt-3">
                <button type="submit" class="btn btn-success w-100 mb-2">Update Profile</button>

                <a href="{{ url('/my_profile') }}" class="btn btn-outline-success w-100">
                    Back To Profile
                </a>
            </div>

        </form>

    </div>

</body>

</html>