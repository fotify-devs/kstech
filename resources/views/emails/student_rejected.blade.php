<!-- resources/views/emails/student_rejected.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Registration Status</title>
</head>
<body>
    <h1>Dear {{ $student->first_name }} {{ $student->last_name }},</h1>
    <p>Unfortunately, your registration has been rejected. Please contact us for more information.</p>
    <p>Best regards,<br>Kenya Safety Tech Team</p>
</body>
</html>
