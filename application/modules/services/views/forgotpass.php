<style>
    .mil-banner {
        padding-top: 100px;
        padding-bottom: 120px;
        height: 100% !important;
    }

    .mil-input {
        height: 50px;
        padding-right: 20px;
    }

    .mil-card {
        padding: 40px;
        border-radius: 30px;
        box-shadow: 0 0 45px rgba(220, 220, 220, 0.9);
        background: #fff;
    }

    @media (max-width:1200px) {
        .mil-banner {
            padding-top: 40px;
            padding-bottom: 80px;
        }
    }
</style>

<div id="smooth-wrapper" class="mil-wrapper">
    <div class="mil-progress-track">
        <div class="mil-progress"></div>
    </div>
    <div class="progress-wrap active-progress"></div>
    <div id="smooth-content">
        <div class="mil-banner mil-dissolve" style="min-height:700px">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6 col-md-8">

                        <div class="mil-card mil-up"
                            style="padding: 40px; border-radius: 30px; box-shadow: 0 0 40px #fff;">

                            <!-- Step 1: Enter Email -->
                            <div id="step1">
                                <h2 class="mil-text-gradient-3 mil-mb-30">Forgot Password</h2>
                                <p class="mil-soft mil-mb-30">Enter your registered email to receive a password reset
                                    link.</p>

                                <input id="email" class="mil-input mil-mb-30" type="email"
                                    placeholder="Enter your email" />

                                <div id="result-email"></div>

                                <button class="mil-btn mil-sm" onclick="nextStep()" id="next-button">
                                    <span id="next" style="color:white">Next</span>
                                    <span id="loading-spinner" style="display:none;">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </span>
                                    <span id="please-wait" style="display:none;">Please wait...</span>
                                </button>

                            </div>

                            <!-- Step 2: OTP Sent -->
                            <div id="step2" style="display:none;">
                                <h2 class="mil-text-gradient-3 mil-mb-30">OTP Sent</h2>
                                <p class="mil-soft mil-mb-30">We've sent an OTP to your email. Enter it below to
                                    proceed.</p>

                                <input id="otp" class="mil-input mil-mb-30" type="text" placeholder="Enter OTP" />

                                <div id="result-otp"></div>
                                <button class="mil-btn mil-light mil-sm mil-mt-20" onclick="backStep()">
                                    ← Back
                                </button>
                                <button class="mil-btn mil-sm" onclick="verifyOtp()" id="verify-button">
                                    <span id="verify">Verify OTP</span>
                                    <span id="otp-spinner" style="display:none;">
                                        <i class="fas fa-spinner fa-spin"></i> Please wait...
                                    </span>
                                </button>


                            </div>

                            <!-- Step 3: Set New Password -->
                            <div id="step3" style="display:none;">
                                <h2 class="mil-text-gradient-3 mil-mb-30">Set New Password</h2>
                                <p class="mil-soft mil-mb-30">Enter your new password below.</p>

                                <input id="new-password" class="mil-input mil-mb-30" type="password"
                                    placeholder="Enter new password" />
                                    
                                <input id="confirm-password" class="mil-input mil-mb-30" type="password"
                                    placeholder="Confirm new password" />

                                <div id="result-password"></div>

                                <button class="mil-btn mil-light mil-sm mil-mt-20" onclick="backStepOtp()">
                                    ← Back
                                </button>

                                <button class="mil-btn mil-sm" onclick="resetPassword()" id="reset-button">
                                    <span id="reset">Reset Password</span>
                                    <span id="reset-spinner" style="display:none;">
                                        <i class="fas fa-spinner fa-spin"></i> Please wait...
                                    </span>
                                </button>


                            </div>

                            <!-- Step 4: Success -->
                            <div id="step4" style="display:none;">
                                <h2 class="mil-text-gradient-3 mil-mb-30">Password Reset Successful</h2>
                                <p class="mil-soft mil-mb-30">Your password has been successfully reset. You can now log
                                    in with your new password.</p>

                                <button class="mil-btn mil-sm"
                                    onclick="window.location.href='<?= site_url('login') ?>'">
                                    Go to Login
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Show loading spinner and send email for OTP
    function nextStep() {
        var email = document.getElementById("email").value;

        // Show loading spinner and hide "Next" button text
        document.getElementById("next").style.display = "none";
        document.getElementById("loading-spinner").style.display = "inline";
        document.getElementById("please-wait").style.display = "inline";  // Show "Please wait..." text
        document.getElementById("next-button").style.display = "inline"; // Make sure button is still visible
        document.getElementById("next-button").disabled = true;   // Disable the button

        // Clear previous error message
        $('#result-email').empty();

        $.ajax({
            url: '<?= site_url('services/send-otp') ?>',
            method: 'POST',
            data: { email: email },
            success: function (response) {
                var res = JSON.parse(response);

                // Hide loading spinner and show "Next" button again
                document.getElementById("next").style.display = "inline";
                document.getElementById("loading-spinner").style.display = "none";
                document.getElementById("please-wait").style.display = "none";
                document.getElementById("next-button").style.display = "inline";
                document.getElementById("next-button").disabled = false;

                if (res.status == 'success') {
                    document.getElementById("step1").style.display = "none";
                    document.getElementById("step2").style.display = "block";
                } else {
                    // Display error message (if email not found)
                    $('#result-email').html('<div class="alert alert-danger">' + res.message + '</div>');
                }
            }
        });
    }


    // Show OTP verification spinner
    function verifyOtp() {
        var otp = document.getElementById("otp").value;

        // Show OTP spinner and disable the button
        document.getElementById("verify").style.display = "none";
        document.getElementById("otp-spinner").style.display = "inline";
        document.getElementById("verify-button").disabled = true;

        $.ajax({
            url: '<?= site_url('services/verify-otp') ?>',
            method: 'POST',
            data: { otp: otp },
            success: function (response) {
                var res = JSON.parse(response);

                // Hide OTP spinner and enable the button
                document.getElementById("verify").style.display = "inline";
                document.getElementById("otp-spinner").style.display = "none";
                document.getElementById("verify-button").disabled = false;

                if (res.status == 'success') {
                    document.getElementById("step2").style.display = "none";
                    document.getElementById("step3").style.display = "block";
                } else {
                    // Display error message for OTP verification
                    $('#result-otp').html('<div class="alert alert-danger">' + res.message + '</div>');
                }
            }
        });
    }

    // Reset password
    function resetPassword() {
        var newPassword = document.getElementById("new-password").value;
        var confirmPassword = document.getElementById("confirm-password").value;

        // If passwords don't match, show error and return early
        if (newPassword !== confirmPassword) {
            $('#result-password').html('<div class="alert alert-danger">Passwords do not match.</div>');
            return;  // Stop further execution
        }
        // Show the loading spinner and disable the button
        document.getElementById("reset-spinner").style.display = "inline";  // Show spinner
        document.getElementById("reset").style.display = "none";  // Hide "Reset Password" text
        document.getElementById("reset-button").disabled = true;  // Disable the button

        // Clear any previous error messages
        $('#result-password').empty();

        $.ajax({
            url: '<?= site_url('services/reset-password') ?>',
            method: 'POST',
            data: { password: newPassword },
            success: function (response) {
                var res = JSON.parse(response);

                // Hide spinner, show the "Reset Password" text, and enable the button
                document.getElementById("reset").style.display = "inline";
                document.getElementById("reset-spinner").style.display = "none";
                document.getElementById("reset-button").disabled = false;

                if (res.status === 'success') {
                    // Show success step
                    document.getElementById("step3").style.display = "none";
                    document.getElementById("step4").style.display = "block";
                } else {
                    // Show error message if the response is not successful
                    $('#result-password').html('<div class="alert alert-danger">' + res.message + '</div>');
                }
            },
            error: function (xhr, status, error) {
                // Handle AJAX error (network issues, etc.)
                console.error('Error:', error);
                $('#result-password').html('<div class="alert alert-danger">There was an error processing your request. Please try again.</div>');

                // Hide spinner and enable button in case of error
                document.getElementById("reset").style.display = "inline";
                document.getElementById("otp-spinner").style.display = "none";
                document.getElementById("reset-button").disabled = false;
            }
        });
    }

    // Go back to previous steps
    function backStep() {
        document.getElementById("step2").style.display = "none";
        document.getElementById("step1").style.display = "block";
    }

    function backStepOtp() {
        document.getElementById("step3").style.display = "none";
        document.getElementById("step2").style.display = "block";
    }
</script>