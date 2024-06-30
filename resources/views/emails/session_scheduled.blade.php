<!DOCTYPE html>
<html>
<head>
    <title>Notification: Thesis Session Scheduled</title>
</head>
<body>
    <h1>Thesis Session Scheduled</h1>
    <p>Dear {{ $lecturer->name }},</p>
    <p>This is to inform you that a new thesis session has been scheduled with the following details:</p>
    <ul>
        <li>Student: {{ $session->student_name }}</li>
        <li>Thesis Title: {{ $session->judul_ta }}</li>
        <li>Session Date: {{ $session->date_session }}</li>
        <li>Room: {{ $session->no_room }} - Session: {{ $session->sesi }}</li>
    </ul>
    <p>Thank you.</p>
</body>
</html>
