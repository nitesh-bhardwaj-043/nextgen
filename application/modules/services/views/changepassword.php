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

                    <h2 class="mil-text-gradient-3 mil-mb-40">Change Password</h2>

                    <!-- Current Password -->
                    <div class="mil-mb-20">
                        <label class="mil-mb-10">Current Password</label>
                        <div style="position: relative;">
                            <input type="password" id="currentPass"
                                   class="mil-input"
                                   placeholder="Enter current password">

                            <span class="toggle-eye" data-target="currentPass">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>

                    <!-- New Password -->
                    <div class="mil-mb-20">
                        <label class="mil-mb-10">New Password</label>
                        <div style="position: relative;">
                            <input type="password" id="newPass"
                                   class="mil-input"
                                   placeholder="Enter new password">

                            <span class="toggle-eye" data-target="newPass">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Confirm New Password -->
                    <div class="mil-mb-20">
                        <label class="mil-mb-10">Confirm New Password</label>
                        <div style="position: relative;">
                            <input type="password" id="confirmPass"
                                   class="mil-input"
                                   placeholder="Re-enter new password">

                            <span class="toggle-eye" data-target="confirmPass">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                    </div>

                    <button class="mil-btn mil-md mil-add-arrow" style="width:100%; margin-top:20px;">
                        Update Password
                    </button>

                </div>

            </div>

        </div>
    </div>
</div>

<style>
    /* Eye Icon */
    .toggle-eye {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #888;
        font-size: 15px;
        z-index: 10;
    }

    @media (max-width:900px) {
        .mil-banner {
            padding: 20px;
        }
    }
</style>

<script>
document.querySelectorAll('.toggle-eye').forEach(icon => {
    icon.addEventListener('click', function () {
        let target = document.getElementById(this.dataset.target);
        let type = target.getAttribute('type');

        target.setAttribute('type', type === "password" ? "text" : "password");

        this.innerHTML = type === "password"
            ? '<i class="fas fa-eye-slash"></i>'
            : '<i class="fas fa-eye"></i>';
    });
});
</script>
