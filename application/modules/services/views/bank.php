<!-- BANK DETAILS PAGE -->
<div class="mil-banner">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-7 col-md-8">

                <div class="mil-card mil-up"
                    style="
                        padding: 40px; 
                        border-radius: 30px; 
                        box-shadow: 0 0 50px rgba(220,220,220,0.8);
                    ">

                    <h2 class="mil-text-gradient-3 mil-mb-30">Bank Details</h2>
                    <p class="mil-soft mil-mb-40">Add or update your bank account for withdrawals.</p>

                    <form>

                        <!-- ACCOUNT HOLDER -->
                        <label class="mil-soft">Account Holder Name</label>
                        <input type="text"
                            class="mil-input mil-mb-30"
                            value="Rahul Kumar"
                            placeholder="Account holder name">

                        <!-- ACCOUNT NUMBER -->
                        <label class="mil-soft">Account Number</label>
                        <input type="text"
                            class="mil-input mil-mb-30"
                            value="123456789012"
                            placeholder="Enter account number">

                        <!-- CONFIRM ACCOUNT NUMBER -->
                        <label class="mil-soft">Confirm Account Number</label>
                        <input type="text"
                            class="mil-input mil-mb-30"
                            value="123456789012"
                            placeholder="Re-enter account number">

                        <!-- IFSC -->
                        <label class="mil-soft">IFSC Code</label>
                        <input type="text"
                            class="mil-input mil-mb-40"
                            value="HDFC0001234"
                            placeholder="Bank IFSC code">

                        <div class="mil-input-group mil-mb-40" style="position: relative;">
                            <input class="mil-input"
                                type="password"
                                id="withdraw-password"
                                placeholder="Enter Your Password">

                            <i class="fa-solid fa-eye"
                                id="password-toggle"
                                onclick="togglePassword()"
                                style="
                                        position:absolute;
                                        right:18px;
                                        top:50%;
                                        transform:translateY(-50%);
                                        cursor:pointer;
                                        color:#888;
                                        font-size:18px;
                                   ">
                            </i>
                        </div>

                        <!-- SAVE BUTTON -->
                        <button class="mil-btn mil-md mil-add-arrow"
                            style="width:100%;">
                            Save Bank Details
                        </button>

                    </form>

                </div>

            </div>

        </div>
    </div>
</div>
<style>
    
    .mil-card {
        margin-top: 220px;
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
</script>