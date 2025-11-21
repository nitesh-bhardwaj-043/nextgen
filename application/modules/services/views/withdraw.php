<div id="smooth-wrapper" class="mil-wrapper">
    <div class="mil-progress-track">
        <div class="mil-progress"></div>
    </div>
    <div class="progress-wrap active-progress"></div>
    <div id="smooth-content">

        <div class="mil-banner" style="margin-top:0px">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-xl-6 col-lg-7 col-md-8">
                        <div class="mil-card mil-up" style="
                            padding: 40px; 
                            border-radius: 30px; 
                            box-shadow: 0 0 50px rgba(215, 215, 215, 1);
                         ">

                            <!-- Step 1 -->
                            <div id="withdraw-step1">
                                <h2 class="mil-text-gradient-3 mil-mb-20">Withdraw Money</h2>
                                <p class="mil-soft mil-mb-30">Enter the amount and password to continue.</p>

                                <label class="mil-soft">Amount</label>
                                <input class="mil-input mil-mb-30" type="number" min="1" placeholder="Enter Amount">

                                <!-- Password with show/hide icon -->
                                <div class="mil-input-group mil-mb-40" style="position: relative;">
                                    <input class="mil-input" type="password" id="withdraw-password"
                                        placeholder="Enter Your Password">

                                    <i class="fa-solid fa-eye" id="password-toggle" onclick="togglePassword()" style="
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

                                <button class="mil-btn mil-md mil-add-arrow" style="width:100%;"
                                    onclick="withdrawNext()">
                                    Continue
                                </button>
                            </div>


                            <!-- Step 2 -->
                            <div id="withdraw-step2" style="display:none; text-align:center;">

                                <div style="display:flex; justify-content:center; margin-bottom:30px;">
                                    <img src="https://i.gifer.com/ZKZg.gif" alt="Loading"
                                        style="width:120px; border-radius:15px;">
                                </div>

                                <h2 class="mil-text-gradient-3 mil-mb-20">Processing Request...</h2>

                                <p class="mil-soft mil-mb-40">
                                    Your withdrawal request has been received.<br>
                                    Verification is in progress.<br><br>
                                    Please keep browsing — the amount will be credited to your bank shortly.
                                </p>

                                <a href="<?= site_url() ?>dashboard" class="mil-btn mil-light mil-md"
                                    style="width:100%;">
                                    Go to Dashboard
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function withdrawNext() {
        document.getElementById("withdraw-step1").style.display = "none";
        document.getElementById("withdraw-step2").style.display = "block";
    }

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