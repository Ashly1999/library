<!DOCTYPE html>
<html>

<head>
    <title>Due Date Reminder</title>
</head>

<body>
    <p>Hi {{ $user->name }},</p>

    <p>This is a reminder that your due date is on <strong>{{ $due_date }}</strong>.</p>

    <p>Please take the necessary action.</p>

    <p>Thank you!</p>
</body>

</html>