<style>
    .mil-banner {
        padding-top: 100px;
        height: 100% !important;
    }

    .mil-input {
        height: 50px;
        padding-right: 50px;
    }

    .password-wrapper {
        position: relative;
        margin-bottom: 30px;
    }

    .password-wrapper input {
        padding-right: 50px !important;
    }

    .password-toggle {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 18px;
        color: #555;
    }

    .password-toggle i {
        pointer-events: none;
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
        }
    }
</style>
<div id="smooth-wrapper" class="mil-wrapper">
    <div class="mil-progress-track">
        <div class="mil-progress"></div>
    </div>
    <div class="progress-wrap active-progress"></div>
    <div id="smooth-content">
        <div class="mil-banner mil-dissolve">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-6 col-md-8">
                        <div class="mil-card mil-up">
                            <form method="post" id="registerform" onsubmit="return false">

                                <h2 class="mil-text-gradient-3 mil-mb-10" style="text-align:center;"> Create Account </h2>
                                <p class="mil-soft mil-mb-40" style="text-align:center;"> Join us and start investing
                                    smartly </p>
                                <!-- FULL NAME -->
                                <label class="mil-mb-10">Full Name</label>
                                <input
                                    type="text" name="name" class="mil-input mil-mb-30" placeholder="Enter your full name">
                                <!-- PHONE -->
                                <label class="mil-mb-10">Phone Number</label>
                                <input type="text" name="phone"
                                    class="mil-input mil-mb-30" placeholder="Enter your phone number">
                                <!-- EMAIL -->
                                <label
                                    class="mil-mb-10">Email</label>
                                <input type="email" name="email" class="mil-input mil-mb-30"
                                    placeholder="Enter your email">
                                <!-- PASSWORD -->
                                <label
                                    class="mil-mb-10">Password</label>
                                <div class="password-wrapper">
                                    <input type="password" name="password" id="reg_password" class="mil-input"
                                        placeholder="Create password">
                                    <span class="password-toggle"
                                        onclick="togglePassword('reg_password', this)">
                                        <i class="fas fa-eye"></i> </span>
                                </div>
                                <!-- CONFIRM PASSWORD -->
                                <label class="mil-mb-10">Confirm Password</label>
                                <div class="password-wrapper"> <input type="password" name="cpassword" id="reg_cpassword" class="mil-input"
                                        placeholder="Confirm password"> <span class="password-toggle"
                                        onclick="togglePassword('reg_cpassword', this)">
                                        <i class="fas fa-eye"></i> </span>
                                </div>
                                <!-- REFERRAL CODE -->
                                <label class="mil-mb-10">Referral Code (Optional)</label>
                                <input type="text" class="mil-input mil-mb-30" placeholder="Enter referral code">
                                <div id="resultregister"></div>
                                <button
                                    id="submitregister" type="submit" class="mil-btn mil-md mil-add-arrow" style="width:100%; margin-bottom:20px;"> Register
                                </button>
                                <div style="text-align:center;"> <span class="mil-soft">Already have an account?</span> <a
                                        href="<?= site_url("login") ?>"
                                        style="color:#f27457; text-decoration:none; font-weight:600;"> Login </a> </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $('#submitregister').click(function(e) {
            e.preventDefault();

            $('#resultregister').show().empty();
            $('#submitregister').prop('disabled', true);

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('services/registerform') ?>",
                data: $("#registerform").serialize(),
                beforeSend: function() {
                    $('#resultregister').html('<div class="alert alert-info">Please wait...</div>');
                },
                success: function(data) {
                    console.log(data);
                    $('#resultregister').empty();
                    let message = "";

                    if (data == "1") {
                        message = "<div class='alert alert-success'><p style='color:green;'>Registered successfully</p></div>";
                        $("#registerform").trigger('reset');
                    } else if (data == "2") {
                        message = "<div class='alert alert-danger'><p>User already exists</p></div>";
                    } else if (data == "3") {
                        message = "<div class='alert alert-danger'><p>Password and confirm password do not match</p></div>";
                    } else {
                        message = data;
                    }

                    $('#resultregister').html(message);
                    $('#submitregister').prop('disabled', false);

                    setTimeout(function() {
                        $('#resultregister').fadeOut('slow', function() {
                            $(this).show().empty();
                        });
                    }, 4000);

                },
                error: function(xhr, status, error) {
                    let errorMsg = `
                        <div class="alert alert-danger">
                        <strong>Request Failed!</strong><br>
                        Status: ${status}<br>
                        Error: ${error}<br>
                        Response: ${xhr.responseText}
                        </div>`;
                    $('#resultregister').html(errorMsg);
                    $('#submitregister').prop('disabled', false);
                }
            });
        });
    });
</script>

<script>
    function togglePassword(fieldId, iconElement) {
        const input = document.getElementById(fieldId);
        const icon = iconElement.querySelector("i");
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>