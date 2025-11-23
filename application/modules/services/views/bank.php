<?php
// Store the UPI ID in a variable if it exists
$upi_id = isset($user_bank_details->upi_id) ? $user_bank_details->upi_id : null;
?>
<div id="smooth-wrapper" class="mil-wrapper">
    <div class="mil-progress-track">
        <div class="mil-progress"></div>
    </div>
    <div class="progress-wrap active-progress"></div>
    <div id="smooth-content"></div>
    <div class="mil-banner" style="height:auto">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-7 col-md-8">
                    <p><?php echo $user_bank_details->upi_id; ?></p>

                    <div class="mil-card mil-up"
                        style="padding: 40px; border-radius: 30px; box-shadow: 0 0 50px rgba(220,220,220,0.8);">
                        <h2 class="mil-text-gradient-3 mil-mb-30">Bank Details</h2>
                        <p class="mil-soft mil-mb-40">Add or update your bank account or UPI ID for withdrawals.</p>

                        <!-- Display success/error messages -->

                        <form id="bank-details-form">

                            <!-- Choose Bank or UPI -->
                            <div class="mil-radio-group mil-mb-30">
                                <label class="mil-soft">Choose Payment Method</label><br>
                                <div style="gap:40px;display:flex">
                                    <div>
                                        <input type="radio" name="payment-method" id="bank-option" value="bank"
                                            onclick="togglePaymentMethod('bank')" checked>
                                        <label for="bank-option" class="mil-soft">Bank Account</label>


                                    </div>
                                    <div>
                                        <input type="radio" name="payment-method" id="upi-option" value="upi"
                                            onclick="togglePaymentMethod('upi')">
                                        <label for="upi-option" class="mil-soft">UPI ID</label>

                                    </div>
                                </div>
                            </div>

                            <!-- Bank Details (Only shown if bank option is selected) -->
                            <div id="bank-details">
                                <label class="mil-soft">Account Holder Name</label>
                                <input type="text" class="mil-input mil-mb-30" name="holder_name"
                                    value="<?php echo isset($user_bank_details->holder_name) ? htmlspecialchars($user_bank_details->holder_name) : ''; ?>"
                                    placeholder="Account holder name">

                                <label class="mil-soft">Account Number</label>
                                <input type="text" class="mil-input mil-mb-30" name="acc_no"
                                    value="<?php echo isset($user_bank_details->acc_no) ? htmlspecialchars($user_bank_details->acc_no) : ''; ?>"
                                    placeholder="Enter account number">

                                <label class="mil-soft">Confirm Account Number</label>
                                <input type="text" class="mil-input mil-mb-30" name="confirm_acc_no"
                                    value="<?php echo isset($user_bank_details->acc_no) ? htmlspecialchars($user_bank_details->acc_no) : ''; ?>"
                                    placeholder="Re-enter account number">

                                <label class="mil-soft">IFSC Code</label>
                                <input type="text" class="mil-input mil-mb-40" name="ifsc_code"
                                    value="<?php echo isset($user_bank_details->ifsc_code) ? htmlspecialchars($user_bank_details->ifsc_code) : ''; ?>"
                                    placeholder="Bank IFSC code">

                                <label class="mil-soft">Bank Name</label>
                                <input type="text" class="mil-input mil-mb-40" name="bank_name"
                                    value="<?php echo isset($user_bank_details->bank_name) ? htmlspecialchars($user_bank_details->bank_name) : ''; ?>"
                                    placeholder="Bank Name">
                            </div>


                            <!-- UPI ID (Only shown if UPI option is selected) -->
                            <div id="upi-details" style="display: none;">
                                <label class="mil-soft">UPI ID</label>
                                <input type="text" class="mil-input mil-mb-40" name="upi_id"
                                    value="<?php echo !empty($upi_id) ? htmlspecialchars($upi_id) : ''; ?>"
                                    placeholder="Enter your UPI ID">
                            </div>

                            <!-- Password Input -->
                            <div class="mil-input-group mil-mb-40" style="position: relative;">
                                <input class="mil-input" type="password" id="withdraw-password" name="password"
                                    placeholder="Enter Your Password">
                                <i class="fa-solid fa-eye" id="password-toggle" onclick="togglePassword()" style="
                                    position: absolute;
                                    right: 18px;
                                    top: 50%;
                                    transform: translateY(-50%);
                                    cursor: pointer;
                                    color: #888;
                                    font-size: 18px;
                                "></i>
                            </div>
                            <div id="message-result"></div>

                            <!-- Save Button -->
                            <button type="submit" class="mil-btn mil-md mil-add-arrow" style="width: 100%;">Save Payment
                                Details</button>

                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<style>
    .mil-card {
        margin-top: 100px;
    }

    @media (max-width:900px) {
        .mil-card {
            margin-top: 0px;
        }

        .mil-banner {
            padding-bottom: 120px !important;
        }
    }
</style>

<script>
    function togglePassword() {
        let pwd = document.getElementById("withdraw-password");
        let icon = document.getElementById("password-toggle");

        if (pwd.type === "password") {
            pwd.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            pwd.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }

    function togglePaymentMethod(method) {
        if (method === 'bank') {
            document.getElementById('bank-details').style.display = 'block';
            document.getElementById('upi-details').style.display = 'none';
        } else if (method === 'upi') {
            document.getElementById('bank-details').style.display = 'none';
            document.getElementById('upi-details').style.display = 'block';
        }
    }

    // Form submission via AJAX
    $('#bank-details-form').submit(function(e) {
        e.preventDefault();

        let formData = $("#bank-details-form").serialize(); // Serialize the form data
        console.log(formData);
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('services/update') ?>', // URL to send the form data
            data: formData,
            beforeSend: function() {
                $('#message-result').html('<div class="alert alert-info">Saving...</div>');
            },
            success: function(response) {
                console.log(response); // Check the response object structure
                response = JSON.parse(response);
                let message = '';
                if (response.status === 'success') {
                    message = `<div class="alert alert-success">${response.message}</div>`;

                    $("#bank-details-form").trigger('reset');
                } else {
                    message = `<div class="alert alert-danger">${response.message}</div>`;
                }

                $('#message-result').html(message);
            },
            error: function(xhr, status, error) {
                let errorMsg = `
                        <div class="alert alert-danger">
                        <strong>Request Failed!</strong><br>
                        Status: ${status}<br>
                        Error: ${error}<br>
                        Response: ${xhr.responseText}
                        </div>`;
                $('#message-result').html(errorMsg);
            }

        });
    });
</script>