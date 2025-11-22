<div id="smooth-wrapper" class="mil-wrapper">
    <div class="mil-progress-track">
        <div class="mil-progress"></div>
    </div>
    <div class="progress-wrap active-progress"></div>
    <div id="smooth-content"></div>
    <div class="mil-banner">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-xl-6 col-lg-7 col-md-8">
                    <div class="mil-card mil-up" style="
                    padding: 40px;
                    border-radius: 30px;
                    box-shadow: 0 0 50px rgba(220,220,220,0.8);
                ">

                        <h2 class="mil-text-gradient-3 mil-mb-40">Change Password</h2>

                        <form id="changePassForm" onsubmit="return false">

                            <div class="mil-mb-20">
                                <label>Current Password</label>
                                <div style="position: relative;">
                                    <input type="password" id="currentPass" name="current" class="mil-input">
                                    <span class="toggle-eye" data-target="currentPass"><i class="fas fa-eye"></i></span>
                                </div>
                            </div>

                            <div class="mil-mb-20">
                                <label>New Password</label>
                                <div style="position: relative;">
                                    <input type="password" id="newPass" name="new" class="mil-input">
                                    <span class="toggle-eye" data-target="newPass"><i class="fas fa-eye"></i></span>
                                </div>
                            </div>

                            <div class="mil-mb-20">
                                <label>Confirm Password</label>
                                <div style="position: relative;">
                                    <input type="password" id="confirmPass" class="mil-input">
                                    <span class="toggle-eye" data-target="confirmPass"><i class="fas fa-eye"></i></span>
                                </div>
                            </div>

                            <div id="resultChange"></div>

                            <button class="mil-btn mil-md mil-add-arrow" id="updateBtn" style="width:100%;">
                                Update Password
                            </button>
                        </form>

                    </div>
                </div>

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
<script>
document.querySelectorAll('.toggle-eye').forEach(icon => {
    icon.addEventListener('click', function() {
        let input = document.getElementById(this.dataset.target);
        input.type = input.type === "password" ? "text" : "password";
        this.innerHTML = input.type === "password"
            ? '<i class="fas fa-eye"></i>'
            : '<i class="fas fa-eye-slash"></i>';
    });
});

$(function () {
    $('#updateBtn').click(function () {

        let current = $('#currentPass').val();
        let newp    = $('#newPass').val();
        let confirm = $('#confirmPass').val();

        $("#resultChange").empty();

        if (newp !== confirm) {
            $("#resultChange").html("<div class='alert alert-danger'>New passwords do not match!</div>");
            return;
        }

        $.ajax({
            type: "POST",
            url: "<?= site_url('services/change_password') ?>",
            data: {
                current: current,
                new: newp
            },
            beforeSend: function () {
                $("#resultChange").html("<div class='alert alert-info'>Updating...</div>");
            },
            success: function (data) {
                let msg = "";

                if (data == "1") {
                    msg = "<div class='alert alert-success'>Password updated successfully!</div>";
                    $("#changePassForm").trigger('reset');
                } 
                else if (data == "2") {
                    msg = "<div class='alert alert-danger'>Current password is incorrect!</div>";
                }
                else {
                    msg = "<div class='alert alert-danger'>Something went wrong!</div>";
                }

                $("#resultChange").html(msg);
            }
        });
    });
});
</script>
