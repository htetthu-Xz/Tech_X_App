<!DOCTYPE html>
<html>
<head>
</head>
<body style="margin: 0;padding: 0;font-family: Arial, sans-serif;font-size: 16px;line-height: 1.5;color: #333">
    <div style="max-width: 600px;margin: 0 auto;padding: 20px;">
        <div style="text-align: center;margin-bottom: 20px;">
            <h1>Verify Your Email Address</h1>
        </div>
        <p>Dear {{ $user->name }},</p>
        <p>Welcome to <strong>Texh X App</strong>! We're thrilled that you've joined our educational community. Before we get started, we need to verify your email address to ensure the security and privacy of your account.</p>
        <p>To complete the registration process and gain full access to our platform, please click the following button to verify your email address:</p>
        <p><a style="display: inline-block;padding: 10px 20px;background-color: #007BFF;color: #fff;text-decoration: none;border-radius: 5px;" href="{{ $verification_link }}">Verify Email</a></p>
        <p>If you can't click the button above, please copy and paste the following URL into your browser:</p>
        <p><a href="{{ $verification_link }}">{{ $verification_link }}</a></p>
        <p>Once your email is verified, you'll be able to explore our wide range of educational resources, connect with fellow learners, and make the most out of your learning journey.</p>
        <p>If you didn't register on Tech X App, please ignore this email. Your account will not be activated.</p>
        <p>Thank you for choosing Tech X App for your learning needs. We're excited to have you on board!</p>
        <p>If you have any questions or need assistance, please don't hesitate to contact our support team at <a href="mailto:[Support Email]">contact.texhX@gmail.com</a> or visit our <a href="[FAQ Link]">FAQ section</a>.</p>
        <div style=" text-align: center;margin-top: 20px;color: #777;">
            <p>Best regards,</p>
            <p>The Tech X App Team</p>
        </div>
    </div>
</body>
</html>
