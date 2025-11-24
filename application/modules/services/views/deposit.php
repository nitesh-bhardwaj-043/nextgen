<div id="smooth-wrapper" class="mil-wrapper">
    <div class="mil-progress-track">
        <div class="mil-progress"></div>
    </div>
    <div class="progress-wrap active-progress"></div>
    <div id="smooth-content">
        <div class="mil-banner mil-dissolve">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-xl-6">
                        <div class="mil-card mil-up" style="padding: 40px; border-radius: 30px; box-shadow: 0 0 40px #fff;">

                            <!-- Step 1 -->
                            <div id="step1">
                                <h2 class="mil-text-gradient-3 mil-mb-30">Deposit Money</h2>
                                <p class="mil-soft mil-mb-30">Scan the QR code or use the UPI ID to make payment.</p>

                                <div class="mil-text-center mil-mb-40">
                                    <img src="<?= base_url('assets/uploads/qr/') ?><?= $qr_image ?>" alt="QR"
                                        style="width: 220px; border-radius: 20px; border: 3px solid #222;">
                                </div>

                                <div class="mil-mb-40">
                                    <h5 class="mil-text-gradient-2 mil-mb-10">UPI ID:</h5>
                                    <div class="mil-btn mil-light" style="padding: 12px 20px;">
                                        <?= $upi_id ?>
                                    </div>
                                </div>

                                <button class="mil-btn mil-sm" onclick="nextStep()">
                                    Next
                                </button>
                            </div>

                            <!-- Step 2 -->
                            <div id="step2" style="display:none;">
                                <h2 class="mil-text-gradient-3 mil-mb-30">Submit Payment Details</h2>
                                <form method="post" id="depositform" onsubmit="return false">
                                    <p class="mil-soft mil-mb-20">Enter UTR number received after successful payment.</p>
                                    <input class="mil-input mil-mb-30" name="utr" type="text" placeholder="Enter UTR / Transaction ID">
                                    <p class="mil-soft mil-mb-20">Enter amount.</p>
                                    <input class="mil-input mil-mb-30" name="amount" type="text" placeholder="Enter Amount">

                                    <p class="mil-soft mil-mb-10">Upload Screenshot:</p>
                                    <input class="mil-input mil-mb-30" type="file" name="image">
                                    <div id="resultdeposit"></div>
                                    <button id="submitdeposit" type="submit" class="mil-btn mil-md mil-add-arrow">
                                        Submit Deposit Request
                                    </button>
                                </form>
                                <button class="mil-btn mil-light mil-md mil-mt-20" onclick="backStep()">
                                    ← Back
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    $(function() {
        $('#submitdeposit').click(function(e) {
            e.preventDefault();

            $('#resultdeposit').show().empty();
            $('#submitdeposit').prop('disabled', true);

            var form = $('#depositform')[0];
            var formData = new FormData(form);

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('services/depositform') ?>",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#resultdeposit').html('<div class="alert alert-info">Please wait...</div>');
                },
                success: function(data) {
                    // console.log(data);
                    $('#resultdeposit').empty();
                    let message = "";

                    if (data == "1") {
                        message = "<div class='alert alert-success'><p style='color:green;'>Form submitted successfully</p></div>";
                        $("#depositform").trigger('reset');
                        // window.location.href = "<?php // echo site_url('dashboard') ?>";
                    } else {
                        message = data;
                    }

                    $('#resultdeposit').html(message);
                    $('#submitdeposit').prop('disabled', false);

                    setTimeout(function() {
                        $('#resultdeposit').fadeOut('slow', function() {
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
                    $('#resultdeposit').html(errorMsg);
                    $('#submitdeposit').prop('disabled', false);
                }
            });
        });
    });
</script>
<script>
    function nextStep() {
        document.getElementById("step1").style.display = "none";
        document.getElementById("step2").style.display = "block";
    }

    function backStep() {
        document.getElementById("step2").style.display = "none";
        document.getElementById("step1").style.display = "block";
    }
</script>