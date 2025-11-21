<div id="smooth-wrapper" class="mil-wrapper">
    <div class="mil-progress-track">
        <div class="mil-progress"></div>
    </div>
    <div class="progress-wrap active-progress"></div>
    <div id="smooth-content">
        <div class="mil-banner">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-xl-6 col-lg-7 col-md-8">

                        <div class="mil-card mil-up" style="
                        padding: 40px; 
                        border-radius: 30px; 
                        box-shadow: 0 0 50px rgba(220,220,220,0.8);
                     ">

                            <h2 class="mil-text-gradient-3 mil-mb-40">Settings</h2>

                            <!-- EDIT INFO -->
                            <a href="<?= site_url("editinfo") ?>" class="mil-card mil-mb-20" style="
                           padding:20px; 
                           border-radius:20px; 
                           background:#fff; 
                           box-shadow:0 0 25px rgba(230,230,230,0.8);
                           display:flex; 
                           justify-content:space-between; 
                           align-items:center;
                       ">
                                <div>
                                    <h5 class="mil-mb-5">Edit Information</h5>
                                    <p class="mil-soft mil-mb-0">Update your name, email & phone details</p>
                                </div>
                                <i class="fas fa-chevron-right" style="color:#999;"></i>
                            </a>

                            <!-- BANK DETAILS -->
                            <a href="<?= site_url("bank") ?>" class="mil-card mil-mb-20" style="
                           padding:20px; 
                           border-radius:20px; 
                           background:#fff; 
                           box-shadow:0 0 25px rgba(230,230,230,0.8);
                           display:flex; 
                           justify-content:space-between; 
                           align-items:center;
                       ">
                                <div>
                                    <h5 class="mil-mb-5">Bank Details</h5>
                                    <p class="mil-soft mil-mb-0">Add or update your withdrawal bank account</p>
                                </div>
                                <i class="fas fa-chevron-right" style="color:#999;"></i>
                            </a>

                            <!-- CHANGE PASSWORD -->
                            <a href="<?= site_url("changepassword") ?>" class="mil-card mil-mb-20" style="
                           padding:20px; 
                           border-radius:20px; 
                           background:#fff; 
                           box-shadow:0 0 25px rgba(230,230,230,0.8);
                           display:flex; 
                           justify-content:space-between; 
                           align-items:center;
                       ">
                                <div>
                                    <h5 class="mil-mb-5">Change Password</h5>
                                    <p class="mil-soft mil-mb-0">Update your login password securely</p>
                                </div>
                                <i class="fas fa-chevron-right" style="color:#999;"></i>
                            </a>

                            <!-- LOGOUT -->
                            <a href="<?= site_url() ?>logout" class="mil-btn mil-md mil-light" style="
                           width:100%; 
                           margin-top:30px;
                           border-radius:15px;
                       ">
                                Logout
                            </a>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
        <style>
            @media (max-width:900px) {
                .mil-banner {
                    padding: 20px;
                }
            }
        </style>