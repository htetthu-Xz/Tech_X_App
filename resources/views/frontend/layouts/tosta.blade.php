<script>
    $.niceToast.setup({
        position: "top-right",
        timeout: 25000,
    });
</script>
@if (session()->has('register_success'))
    <script>
        $.niceToast.success('<strong>Successfully Registered</strong><br>Check Your email inbox to verify your email.');
    </script>
@endif
@if (session()->has('resend_success'))
    <script>
        $.niceToast.success('<strong>Verification Link Successfully sent</strong><br>Check Your email inbox to verify your email.');
    </script>
@endif
@if (session()->has('verify_success'))
    <script>
        $.niceToast.success('<strong>Successfully Verified Email</strong><br>Please login to your account and enjoy our courses.');
    </script>
@endif
@if (session()->has('error'))
    <script>
        $.niceToast.error('<strong>Something Worng !</strong>');
    </script>
@endif
@if (session()->has('success_reset_link'))
    <script>
        $.niceToast.success('<strong>Successfully sent Reset Password Link</strong><br>Check Your email inbox to reset your password.');
    </script>
@endif
@if (session()->has('expired'))
    <script>
        $.niceToast.error('<strong>Link has Expired!</strong>');
    </script>
@endif
@if (session()->has('reset_success'))
    <script>
        $.niceToast.success('<strong>Password successfully changed</strong><br>Login to your account.');
    </script>
@endif