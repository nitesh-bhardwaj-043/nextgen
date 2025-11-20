<div class="modal fade container custom-modal" id="qteModal" tabindex="-1" role="dialog" aria-labelledby="qteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-3" style="background: linear-gradient(107.2deg, rgb(150, 15, 15) 10.6%, rgb(247, 0, 0) 91.1%);">
            <div class="contact-form-header">
                <div class="row">
                    <div class="col-10">
                        <span style=" border:none; color:white; font-size:30px;font-weight:bold;line-height:1;">Get a free quote</span>
                    </div>
                    <div class="col-2 text-end">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" onclick="setClose()" style=" border:none; color:red; font-size:30px;margin-right:15px;">
                            <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                        </button>
                    </div>
                </div>
            </div>
            <form method="post" id="quotemodal" onsubmit="return false">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-icon">
                                <i class="far fa-user-tie"></i>
                                <input type="text" class="form-control" name="name" placeholder="Your Name">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fa-solid fa-phone"></i>
                                <input type="tel" class="form-control" name="phone" placeholder="Mobile Number">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-icon">
                            <i class="fa-solid fa-envelope"></i>
                                <input type="text" class="form-control" name="email" placeholder="Your Email">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fa-solid fa-location-dot"></i>
                                <input type="text" class="form-control" name="mfrom" placeholder="From">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <div class="form-icon">
                                <i class="fa-solid fa-thumbtack"></i>
                                <input type="text" class="form-control" name="mto" placeholder="To">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-icon">
                        <i class="far fa-comment-lines"></i>
                        <textarea name="message" cols="30" rows="5" class="form-control" placeholder="Write Your Message"></textarea>
                    </div>
                </div>
                <div id="resultquotemodal"></div>
                <div class="col-12 text-center">
                    <button id="submitbquotemodal" type="submit" class="theme-btn" style="background-color:#FBA707;">Submit <i class="far fa-paper-plane"></i></button>
                    <button onclick="$('#resultquotemodal').html('');" type="reset" class="theme-btn" style="background-color:white;color:#A0A0A0;">Clear <i class="far fa-trash-alt"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $('#submitbquotemodal').click(function() {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('contacts/booking') ?>",
                data: $("#quotemodal").serialize(),
                beforeSend: function() {
                    $('#resultquotemodal').html('<p style="color:red">Please wait...</p>');
                },
                success: function(data) {
                    $('#resultquotemodal').empty();
                    if (data == '1') {
                        data = "<div class='alert alert-success'><p style='color:green;'>Thank you! Your quote request successfully submitted. We'll respond soon.</p></div>";
                        $("#quotemodal").trigger('reset');
                        <!-- Event snippet for Phone call lead conversion page -->
                        gtag('event', 'conversion', {'send_to': 'AW-16778879117/JlJPCPjgvOwZEI3B5cA-'});
                    }
                    $('#resultquotemodal').html(data);
                }
            });
        });
    });
</script>
