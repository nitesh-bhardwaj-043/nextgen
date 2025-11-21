<style>
    .help-header {
        text-align: center;
        padding: 60px 20px 30px;
    }

    .help-header h2 {
        font-weight: 700;
        font-size: 32px;
    }

    .help-header p {
        font-size: 16px;
        color: #6b7a8c;
    }

    /* CARD */
    .help-card {
        background: #fff;
        border-radius: 22px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
        border: 1px solid #eef2f5;
    }

    /* ACCORDION */
    .faq-item {
        background: #fff;
        border-radius: 18px;
        border: 1px solid #e5edf0;
        margin-bottom: 15px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
    }

    .faq-question {
        padding: 16px 20px;
        font-size: 17px;
        font-weight: 600;
        color: #004d4d;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .faq-answer {
        display: none;
        padding: 15px 20px;
        font-size: 15px;
        color: #444;
        border-top: 1px solid #eef2f5;
    }

    .faq-question i {
        transition: 0.3s;
    }

    .faq-item.active .faq-answer {
        display: block;
    }

    .faq-item.active .faq-question i {
        transform: rotate(180deg);
    }

    /* CONTACT BOX */
    .contact-box {
        background: #f7fbfc;
        border-radius: 20px;
        padding: 30px;
        text-align: center;
        border: 1px solid #e7f2f5;
    }

    .contact-box h4 {
        font-weight: 700;
        margin-bottom: 8px;
    }

    .contact-box p {
        color: #6b7a8c;
    }

    .contact-box a {
        margin-top: 10px;
        display: inline-block;
        padding: 10px 22px;
        background: #004d4d;
        color: #fff;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 600;
        transition: .2s;
    }

    .contact-box a:hover {
        opacity: 0.85;
    }
</style>

<div id="smooth-wrapper" class="mil-wrapper">
    <div class="mil-progress-track">
        <div class="mil-progress"></div>
    </div>
    <div class="progress-wrap active-progress"></div>
    <div id="smooth-content"></div>
    <div class="mil-banner" style="height:auto; padding-bottom:50px;display:flex;flex-direction:column ">

        <!-- HEADER -->
        <div class="help-header mil-up">
            <h2 class="mil-text-gradient-3">Help & Support</h2>
            <p>We're here to assist you. Find answers or contact us anytime.</p>
        </div>

        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-8 col-md-10">

                    <!-- FAQ SECTION -->
                    <div class="help-card mil-up">
                        <h4 class="mil-mb-20" style="font-weight:700; color:#004d4d;">Frequently Asked Questions</h4>

                        <!-- FAQ ITEM -->
                        <div class="faq-item">
                            <div class="faq-question">
                                How to deposit money?
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                Go to the Deposit page → Enter Amount → Upload Screenshot → Submit.
                                Our team will verify and update your wallet.
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                How much time withdrawal takes?
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                Withdrawals are usually processed within 30 minutes after verification.
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                My payment is stuck, what should I do?
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                Contact support with your UTR number and screenshot.
                                Our team will assist ASAP.
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                How to change my password?
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                Go to Settings → Change Password → Enter new password → Save.
                            </div>
                        </div>

                    </div>

                    <!-- CONTACT BOX -->
                    <div class="contact-box mil-up">
                        <h4>Still need help?</h4>
                        <p>Our support team is available 24/7.</p>

                        <a href="tel:+91 6295827525">
                            Contact Support
                        </a>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>
<script>
    const faqItems = document.querySelectorAll(".faq-item");

    faqItems.forEach(item => {
        const question = item.querySelector(".faq-question");

        question.addEventListener("click", () => {
            // Close all other items
            faqItems.forEach(i => {
                if (i !== item) {
                    i.classList.remove("active");
                }
            });

            // Toggle the clicked item
            item.classList.toggle("active");
        });
    });
</script>