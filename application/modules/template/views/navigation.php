<div class="mil-top-panel">
    <div class="container">
        <a href="<?= site_url() ?>index.html" class="mil-logo">
            <img src="<?= base_url() ?>assets/images/.png" alt="NextGen" width="83" height="32">
        </a>
        <nav class="mil-top-menu">
            <ul>
                <li class=" mil-active">
                    <a href="<?= site_url() ?>#.">Home</a>
                </li>
                <li>
                    <a href="<?= site_url("deposit") ?>">Deposit</a>
                </li>
                <li>
                    <a href="<?= site_url("withdraw") ?>">Withdrawal</a>

                </li>
                <li>
                    <a href="<?= site_url("setting") ?>">Setting</a>

                </li>
                <li>
                    <a href="<?= site_url("help") ?>">Help</a>
                </li>


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
        </style>

        <div class="auth-wrapper">
            <a href="<?= site_url() ?>login.html">Login</a>
            <span style="color:#fff;">/</span>
            <a href="<?= site_url() ?>register.html">Sign Up</a>
        </div>

    </div>

</div>
</div>
</div>
</div>