<h2 style="color:#333; text-align:center;">Welcome {{ $name }} 👋</h2>

<p style="text-align:center; font-size:16px;">
    Welcome to <strong>Book</strong>! Your account has been created successfully.
</p>

<p style="text-align:center; font-size:16px;">
    Below are your account details:
</p>

<!-- Account Info Box -->
<div style="
    max-width:420px;
    margin:20px auto;
    padding:18px 22px;
    border:1px solid #e0e0e0;
    border-radius:10px;
    background:#f9f9f9;
    font-size:15px;
    color:#333;
    text-align:left;
">
    <p style="margin:8px 0;">
        <strong>Name:</strong> {{ $name }}
    </p>
    <p style="margin:8px 0;">
        <strong>Email:</strong> {{ $email }}
    </p>
    <p style="margin:8px 0;">
        <strong>Gender:</strong> {{ $gender }}
    </p>
    <p style="margin:8px 0;">
        <strong>Mobile:</strong> {{ $mobile }}
    </p>
</div>

<p style="text-align:center; font-size:16px;">
    You can now log in using your registered email ID
    (<strong>{{ $email }}</strong>) and start exploring our collection.
</p>

<p style="text-align:center; font-size:14px; color:#666;">
    If any of this information is incorrect, please contact our support team.<br>
    <strong>Team Book</strong>
</p>
