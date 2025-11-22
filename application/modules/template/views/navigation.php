<?php
// Get current URI segment
$current_segment = $this->uri->segment(1); // 'deposit', 'withdraw', etc.
?>
<style>
    .logo{
        height:100px;
    }
    @media (max-width:900px){
        .logo{
            height:60px;
        }
    }
</style>
<div class="mil-top-panel">
    <div class="container">
        <a href="<?= site_url() ?>index.html" class="mil-logo">
            <img src="<?= base_url() ?>assets/images/logo_final.png" alt="NextGen" class="logo">
        </a>
        <nav class="mil-top-menu">
            <ul>
                <li class="<?= ($current_segment == '' || $current_segment == 'home') ? 'mil-active' : '' ?>">
                    <a href="<?= site_url() ?>#.">Home</a>
                </li>
                <li class="<?= ($current_segment == 'deposit') ? 'mil-active' : '' ?>">
                    <a href="<?= site_url("deposit") ?>">Deposit</a>
                </li>
                <li class="<?= ($current_segment == 'withdraw') ? 'mil-active' : '' ?>">
                    <a href="<?= site_url("withdraw") ?>">Withdrawal</a>
                </li>
                <li class="<?= ($current_segment == 'help') ? 'mil-active' : '' ?>">
                    <a href="<?= site_url("help") ?>">Help</a>
                </li>
                <?php if ($this->session->userdata('logged_in')): ?>
                    <li class="<?= ($current_segment == 'setting') ? 'mil-active' : '' ?>">
                        <a href="<?= site_url("setting") ?>">Setting</a>
                    </li>
                    <li class="<?= ($current_segment == 'dashboard') ? 'mil-active' : '' ?>">
                        <a href="<?= site_url("dashboard") ?>">Dashboard</a>
                    </li>

                <?php endif;  ?>
            </ul>
        </nav>

        <style>
            .auth-wrapper {
                display: flex;
                align-items: center;
                gap: 10px;
                background: #f27457;
                padding: 8px 16px;
                border-radius: 6px;
            }

            .auth-wrapper a {
                color: #fff;
                text-decoration: none;
                font-weight: 500;
            }
            @media (max-width:900px){
                .auth-wrapper{
                    gap:5px;
                    padding: 4px 8px;
                    font-size: 13px;
                }
            }
        </style>

        <?php if ($this->session->userdata('logged_in')): ?>

            <div class="auth-wrapper">
                <a href="<?= site_url("logout") ?>">Logout</a>
            </div>

        <?php else: ?>

            <div class="auth-wrapper">
                <a href="<?= site_url("login") ?>">Login</a>
                <span style="color:#fff;">/</span>
                <a href="<?= site_url("register") ?>">Sign Up</a>
            </div>

        <?php endif; ?>

        <div class="mil-menu-btn"><span></span></div>
    </div>
</div>