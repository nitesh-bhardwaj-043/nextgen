<style>
.mil-top-panel {
    background: #ffffff !important;
    position: sticky;
    top: 0;
    z-index: 9999;
    box-shadow: 0 2px 20px rgba(220,220,220,0.5);
}
#smooth-content {
    padding-top: 120px !important;
}
.mil-banner {
    padding-top: 60px;
    padding-bottom: 60px;
}
@media (max-width:900px) {
    #smooth-content {
        padding-top: 140px !important;
    }
    .mil-banner {
        padding-top: 40px;
        padding-bottom: 80px;
    }
}
.toggle-eye {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #888;
}
</style>

<div class="mil-banner">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-8">

                <div class="mil-card mil-up"
                     style="
                        padding: 40px;
                        border-radius: 30px;
                        box-shadow: 0 0 45px rgba(220,220,220,0.9);
                     ">

                    <h2 class="mil-text-gradient-3 mil-mb-10" style="text-align:center;">
                        Welcome Back
                    </h2>

                    <p class="mil-soft mil-mb-40" style="text-align:center;">
                        Login to continue
                    </p>

                    <!-- PHONE OR EMAIL -->
                    <label class="mil-mb-10">Phone or Email</label>
                    <input type="text"
                        class="mil-input mil-mb-30"
                        placeholder="Enter your phone or email">

                    <!-- PASSWORD -->
                    <label class="mil-mb-10">Password</label>
                    <div style="position: relative; margin-bottom:30px;">
                        <input type="password"
                               id="login_password"
                               class="mil-input"
                               placeholder="Enter your password">

                        <span class="toggle-eye" data-target="login_password">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>

                    <!-- Login Button -->
                    <button class="mil-btn mil-md mil-add-arrow"
                            style="width:100%; margin-bottom:20px;">
                        Login
                    </button>

                    <div style="text-align:center;">
                        <a href="<?= site_url("forgot-password")?>"
                           class="mil-soft"
                           style="text-decoration:none;">
                           Forgot Password?
                        </a>
                    </div>

                    <div style="text-align:center; margin-top:10px;">
                        <span class="mil-soft">Don't have an account?</span>
                        <a href="<?= site_url("register")?>"
                           style="color:#f27457; text-decoration:none; font-weight:600;">
                           Sign Up
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>

<script>
document.querySelectorAll('.toggle-eye').forEach(icon => {
    icon.addEventListener('click', function () {
        let input = document.getElementById(this.dataset.target);
        let type = input.type;

        input.type = type === "password" ? "text" : "password";
        this.innerHTML =
            type === "password"
                ? '<i class="fas fa-eye-slash"></i>'
                : '<i class="fas fa-eye"></i>';
    });
});
</script>
