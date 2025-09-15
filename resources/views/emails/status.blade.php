<!DOCTYPE html>
<html>

<head>
    <title>Status Update</title>
</head>

<body>
    <h2>Hello {{ $user->name  }},</h2>
    <p>Your book status has been updated to: <strong>{{ $user->status }}</strong></p>
    <p>Thank you, <br>Laravel App</p>
</body>

</html>