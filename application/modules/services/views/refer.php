<style>
    .mil-banner {
        padding-top: 120px;
        height: 100% !important;
    }

    .mil-card {
        padding: 40px;
        border-radius: 30px;
        box-shadow: 0 0 45px rgba(220,220,220,0.9);
        background: #fff;
    }

    .mil-label {
        font-weight: 600;
        color: #0f3f44;
        font-size: 15px;
        margin-bottom: 10px;
        display: block;
    }

    .mil-input-box {
        height: 55px;
        border-radius: 14px;
        border: 1px solid #dfe8ea;
        padding: 0 20px;
        width: 100%;
        background: #fdfefe;
        font-size: 15px;
        color: #123b40;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .mil-copy-btn {
        cursor: pointer;
        color: #0c7c84;
        font-weight: bold;
        font-size: 14px;
    }

    .mil-share-btn {
        width: 100%;
        height: 50px;
        border-radius: 12px;
        background: #25D366;
        border: none;
        color: white;
        font-size: 18px;
        font-weight: 600;
        margin-top: 20px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .mil-share-btn i {
        font-size: 20px;
    }

    .mil-title {
        text-align: center;
        font-size: 34px;
        font-weight: 700;
        color: #0f3f44;
    }

    .mil-subtitle {
        text-align: center;
        color: #5e7a7c;
        margin-bottom: 40px;
        font-size: 16px;
    }

    @media (max-width: 1200px) {
        .mil-banner {
            padding-top: 40px;
        }
    }
</style>

<div id="smooth-wrapper" class="mil-wrapper">

    <div class="mil-progress-track">
        <div class="mil-progress"></div>
    </div>

    <div class="progress-wrap active-progress"></div>

    <div id="smooth-content">

        <div class="mil-banner mil-dissolve">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-xl-6 col-lg-6 col-md-8">

                        <div class="mil-card mil-up">

                            <h2 class="mil-title">Refer & Earn</h2>
                            <p class="mil-subtitle">Invite friends and earn exciting rewards!</p>

                            <!-- REFERRAL CODE -->
                            <label class="mil-label">Your Referral Code</label>
                            <div class="mil-input-box" id="refCodeBox">
                                <span id="refCode">NG12345</span>
                                <span class="mil-copy-btn" onclick="copyText('refCode')">Copy</span>
                            </div>

                            <!-- REFERRAL LINK -->
                            <label class="mil-label" style="margin-top:25px;">Your Referral Link</label>
                            <div class="mil-input-box" id="refLinkBox">
                                <span id="refLink">https://nextgen.com/signup?ref=NG12345</span>
                                <span class="mil-copy-btn" onclick="copyText('refLink')">Copy</span>
                            </div>

                            <!-- SHARE BUTTON -->
                            <button class="mil-share-btn" onclick="shareOnWhatsApp()">
                                <i class="fab fa-whatsapp"></i> Share on WhatsApp
                            </button>

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

<script>
function copyText(elementId) {
    var text = document.getElementById(elementId).innerText;
    navigator.clipboard.writeText(text);
    alert("Copied Successfully!");
}

function shareOnWhatsApp() {
    const code = document.getElementById("refCode").innerText;
    const link = document.getElementById("refLink").innerText;

    const message =
        `🔥 *Join NextGen & Start Investing Smartly!* 🔥\n\n` +
        `Use my referral code: *${code}*\n\n` +
        `Register here: ${link}\n\n` +
        `Trusted platform | Daily Growth | Instant Withdrawals`;

    const whatsappURL = `https://wa.me/?text=${encodeURIComponent(message)}`;

    window.open(whatsappURL, "_blank");
}
</script>
