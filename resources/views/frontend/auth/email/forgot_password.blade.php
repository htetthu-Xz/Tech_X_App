<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; padding: 20px;">
    <h1 style="color: #007bff; text-align: center;">Password Reset Request</h1>
    <p>Hello {{ $user->name }},</p>
    <p>We hope this email finds you well. It appears that you've recently requested a password reset for your account at Texh X App. Security is our top priority, and we want to ensure your account remains safe and accessible only to you.</p>
    
    <p style="text-align: center;">
        <a href="{{ $reset_password_link }}" style="display: inline-block; background-color: #007bff; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 5px;">Reset Your Password</a>
    </p>

    <p>If you didn't request a password reset, please ignore this email. Your account will remain secure, and no changes will be made.</p>

    <p>Please remember to keep your password confidential and avoid sharing it with anyone. We will never ask for your password via email or any other communication.</p>

    <p>If you encounter any issues during the password reset process or have any concerns regarding your account, please don't hesitate to reach out to our support team at contact.texhX.com.</p>

    <p>Thank you for choosing Tech X App. We value your trust and are committed to providing you with the best user experience possible.</p>

    <p>Best regards,</p>
    <p>Tech X<br>TechX.com</p>

    <p style="font-size: 80%; text-align: center; color: #888;">Please do not reply to this email. For assistance, contact our support team at contact.techX.com.</p>
</body>
</html>
