<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reply from Azii Jewelers</title>
</head>
<body>
    <p>Dear {{ $messageData->name }},</p>

    <p>{{ $replyText }}</p>

    <p>Original Message:</p>
    <blockquote style="background: #f9f9f9; padding: 10px; border-left: 4px solid #ccc;">
        {{ $messageData->message }}
    </blockquote>

    <br>
    <p>Best regards,<br><strong>Azii Jewelers Team</strong></p>
</body>
</html>
