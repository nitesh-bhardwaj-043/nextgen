<style>
    .mil-banner{
        padding-top: 100px;
        padding-bottom: 120px;
        height: 100%!important;
    }

    .mil-input{
        height: 50px;
        padding-right: 20px;
    }

    .mil-card {
        padding: 40px;
        border-radius: 30px;
        box-shadow: 0 0 45px rgba(220,220,220,0.9);
        background: #fff;
    }

    @media (max-width:1200px){
        .mil-banner{
            padding-top: 40px;
            padding-bottom: 80px;
        }
    }
</style>

<div id="smooth-wrapper" class="mil-wrapper">

    <!-- Scroll Progress -->
    <div class="mil-progress-track">
        <div class="mil-progress"></div>
    </div>

    <!-- Back to top -->
    <div class="progress-wrap active-progress"></div>

    <div id="smooth-content">

        <div class="mil-banner mil-dissolve">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-xl-6 col-lg-6 col-md-8">

                        <div class="mil-card mil-up">

                            <h2 class="mil-text-gradient-3 mil-mb-10" style="text-align:center;">
                                Forgot Password
                            </h2>

                            <p class="mil-soft mil-mb-40" style="text-align:center;">
                                Enter your registered email to reset your password
                            </p>

                            <!-- EMAIL -->
                            <label class="mil-mb-10">Email Address</label>
                            <input type="email"
                                   class="mil-input mil-mb-30"
                                   placeholder="Enter your registered email">

                            <button class="mil-btn mil-md mil-add-arrow"
                                    style="width:100%; margin-bottom:20px;">
                                Send Reset Link
                            </button>

                            <div style="text-align:center;">
                                <span class="mil-soft">Remember your password?</span>
                                <a href="<?= site_url("login") ?>"
                                   style="color:#f27457; text-decoration:none; font-weight:600;">
                                    Login
                                </a>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
