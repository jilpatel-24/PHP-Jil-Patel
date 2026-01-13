@extends('website.layout.structure')

@section('content')

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f5f5f5;
    }

    .profile-wrapper {
        min-height: 80vh;
        padding: 120px 15px 60px;
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }

    .profile-card {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        max-width: 700px;
        width: 100%;
        padding: 30px;
    }

    .profile-header {
        display: flex;
        align-items: center;
        margin-bottom: 25px;
    }

    .profile-avatar {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background: linear-gradient(135deg, #ff7b00, #ff3c3c);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 28px;
        font-weight: 600;
        margin-right: 20px;
    }

    .profile-name {
        font-size: 22px;
        font-weight: 600;
        margin-bottom: 5px;
    }

    .profile-username {
        font-size: 14px;
        color: #777;
    }

    .profile-info h5 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .profile-info p {
        margin-bottom: 4px;
        color: #555;
    }

    .profile-label {
        font-weight: 600;
        color: #333;
    }

    .profile-actions {
        margin-top: 25px;
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .btn-primary {
        background: #ff5e3a;
        border-color: #ff5e3a;
    }

    .btn-primary:hover {
        background: #e44822;
        border-color: #e44822;
    }

    .btn-outline-secondary {
        border-radius: 50px;
    }
</style>

<div class="profile-wrapper">
    <div class="profile-card">

        {{-- Header --}}
        <div class="profile-header">
            @php
                $name = $customer->name ?? 'User';
                $initial = strtoupper(mb_substr($name, 0, 1));
            @endphp

            <div class="profile-avatar">
                {{ $initial }}
            </div>

            <div>
                <div class="profile-name">Hi.. {{ $customer->name }}</div>
                <div class="profile-username">Welcome to your profile</div>
            </div>
        </div>

        {{-- Account Info --}}
        <div class="profile-info">
            <h5>Account Details</h5>

            <p>
                <span class="profile-label">Customer ID:</span>
                {{ $customer->id }}
            </p>

            <p>
                <span class="profile-label">Name:</span>
                {{ $customer->name }}
            </p>

            <p>
                <span class="profile-label">Email:</span>
                {{ $customer->email }}
            </p>

            <p>
                <span class="profile-label">Mobile:</span>
                {{ $customer->mobile }}
            </p>

            <p>
                <span class="profile-label">Gender:</span>
                {{ $customer->gender ?? 'Not set' }}
            </p>

            <p>
                <span class="profile-label">Account Status:</span>
                {{ $customer->status ?? 'Not set' }}
            </p>

        </div>

        {{-- Actions --}}
        <div class="profile-actions">
            <a href="{{ url('/') }}" class="btn btn-outline-danger btn-sm">
                Back To Home
            </a>

            <a href="/edit_profile/{{$customer->id}}" class="btn btn-primary btn-sm">
                Edit Profile
            </a>

            <a href="{{ url('/cust_logout') }}" class="btn btn-outline-danger btn-sm">
                Logout
            </a>
        </div>

    </div>
</div>

@endsection
