<style>
    .mil-banner {
        padding-top: 40px !important;
    }


    .stock-marquee-wrapper {
        width: 100%;
        overflow: hidden;
        padding: 20px 10px;
        background: #f6f9fc;
        border-radius: 20px;
    }

    .stock-marquee {
        display: flex;
        gap: 20px;
        animation: scroll-left 25s linear infinite;
    }

    .stock-card {
        min-width: 220px;
        background: #fff;
        padding: 16px;
        border-radius: 15px;
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 12px;
        box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
        border: 1px solid #e8eef1;
        transition: 0.2s;
    }

    .stock-card:hover {
        transform: translateY(-3px);
    }

    .stock-logo {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        object-fit: contain;
        background: #fff;
        padding: 5px;
        border: 1px solid #eee;
    }

    .info {
        flex: 1;
    }

    .stock-name {
        font-size: 14px;
        font-weight: 600;
        color: #004d4d;
        margin: 0;
    }

    .stock-price {
        font-size: 15px;
        font-weight: 700;
        margin-top: 4px;
        color: #333;
    }

    .change-box {
        margin-top: 6px;
        display: inline-block;
        font-size: 13px;
        font-weight: 600;
        padding: 3px 8px;
        border-radius: 6px;
        color: #fff;
    }

    @keyframes scroll-left {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    .stock-card-grid {
        background: #fff;
        border-radius: 15px;
        padding: 18px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        border: 1px solid #e8eef1;
        transition: 0.25s;
    }

    .stock-card-grid:hover {
        transform: translateY(-4px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    .stock-logo-grid {
        width: 46px;
        height: 46px;
        border-radius: 10px;
        padding: 5px;
        background: #fff;
        border: 1px solid #eee;
        object-fit: contain;
    }

    .stock-name-grid {
        font-size: 16px;
        font-weight: 600;
        color: #003939;
    }

    .stock-price-grid {
        font-size: 18px;
        font-weight: 700;
        margin-top: 4px;
    }

    .stock-change-grid {
        font-size: 14px;
        font-weight: 600;
        padding: 5px 10px;
        color: #fff;
        border-radius: 8px;
        display: inline-block;
        margin-top: 8px;
    }

    .mil-banner {
        margin-top: 50px;
    }

    @media (max-width:992px) {
        .stock-card {
            min-width: 180px;
        }
    }

    @media (max-width:576px) {
        .stock-card {
            min-width: 150px;
            padding: 12px;
        }

        .stock-logo {
            width: 35px;
            height: 35px;
        }

        .stock-logo-grid {
            width: 38px;
            height: 38px;
        }
    }

    /* Skeleton Loading */
    .skeleton {
        background: #e2e2e2;
        border-radius: 6px;
        display: inline-block;
    }

    .skeleton-logo {
        width: 40px;
        height: 40px;
        border-radius: 8px;
    }

    .skeleton-name {
        width: 80px;
        height: 14px;
        margin: 2px 0;
    }

    .skeleton-price {
        width: 60px;
        height: 18px;
        margin: 2px 0;
    }

    .skeleton-change {
        width: 60px;
        height: 16px;
        border-radius: 6px;
        margin-top: 4px;
    }

    .skeleton-grid-logo {
        width: 46px;
        height: 46px;
        border-radius: 10px;
    }

    .skeleton-grid-name {
        width: 100px;
        height: 16px;
        margin: 4px 0;
    }

    .skeleton-grid-price {
        width: 70px;
        height: 18px;
        margin: 2px 0;
    }

    .skeleton-grid-change {
        width: 70px;
        height: 16px;
        border-radius: 8px;
        margin-top: 6px;
    }

    /* Animation */
    @keyframes shimmer {
        0% {
            background-position: -200px 0;
        }

        100% {
            background-position: 200px 0;
        }
    }

    .skeleton {
        background: linear-gradient(90deg, #e2e2e2 25%, #f0f0f0 50%, #e2e2e2 75%);
        background-size: 400px 100%;
        animation: shimmer 1.2s infinite;
    }

    @media (max-width:900px) {
        .mil-banner {
            padding-top: 30px !important;
        }

        .stock-name {
            font-size: 12px;
            margin-top: 0px;
            line-height: 1;
        }

        .stock-price {
            font-size: 13px;
            margin-top: 0px;
            line-height: 1.2;
        }

        .change-box {
            margin-top: 0px;
            font-size: 10px;
        }
    }

    @media(max-width:400px) {
        .stock-card {
            padding: 6px;
        }
    }
</style>


<!-- Marquee Section -->
<div id="marquee-container" style="display: flex; flex-direction: column;height:auto;margin-top:100px"></div>


<div class="mil-features">
    <div class="container">
        <div class="row flex-sm-row-reverse justify-content-between align-items-center">
            <div class="col-xl-6 mil-mb-80">
                <h2 class="mil-mb-30" id="dynamic-heading">Your Money Deserves More — Earn Profit</h2>
                <p class="mil-text-l mil-pale-2 mil-mb-60 mil-up" id="dynamic-paragraph">
                    Invest smartly and watch your wealth grow every single day. Our platform delivers a clear,
                    simple upto <strong>1% daily credit allocation</strong>, backed by secure systems, transparent terms, and
                    real-time tracking—so your money works harder while you stay in control.
                </p>
                <div class="">
                    <div style="display:flex; justify-content:center;">
                        <a href="<?= site_url("dashboard") ?>" class="mil-btn mil-m mil-add-arrow">
                            Start Earning
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-xl-5 mil-mb-80">
                <div class="mil-image-frame mil-up">
                    <img src="<?= base_url() ?>assets/images/rrr.png" alt="image" class="mil-scale-img" data-value-1="1"
                        data-value-2="1.2">
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    #dynamic-paragraph {
    border: 1px solid #d4c8b0;          /* book-style soft border */
    padding: 15px 20px;                 /* book paragraph spacing */
    border-radius: 8px;                 /* smooth edges */
    background: #faf7f2;                /* paper-style background */
    box-shadow: 0 2px 6px rgba(0,0,0,0.05); /* soft book shadow */
}

    /* Add fade in/out effects */
    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        0% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }

    .fade-in {
        animation: fadeIn 1s forwards;
    }

    .fade-out {
        animation: fadeOut 1s forwards;
    }
    
</style>

<script>
    $(document).ready(function() {
        // Array of objects containing heading and paragraph text
        var textArray = [{
                heading: "Your Money Deserves More — Earn Profit",
                paragraph: "Invest smartly and watch your wealth grow every single day. Our platform delivers a clear, simple upto <strong>1% daily return</strong>, backed by secure systems, transparent terms, and real-time tracking—so your money works harder while you stay in control."
            },
            {
                heading: "Share and receive upto 5% guaranteed Incomes",
                paragraph: "Share your referral link and earn upto 5% on every new user you bring in. The more you refer, the more you earn—no limits, no hidden conditions"
            },
            {
                heading: "Achieve Financial Freedom Faster",
                paragraph: "Join a community of smart investors who are already earning daily returns. With transparent processes and guaranteed returns, we make investing simple."
            },
            {
                heading: "Predictable Growth, Zero Market Stress",
                paragraph: "We understand that not everyone has the time or expertise to navigate the ups and downs of financial markets. That’s why our system is built to deliver stable, predictable, and transparent Incomes—without exposing you to the risks of daily price fluctuations."
            }
            // Add more text objects as needed
        ];

        var index = 0; // To track current text in the array

        function updateContent() {
            var currentText = textArray[index];

            // Add fade-out animation to the current text before changing it
            $('#dynamic-heading').addClass('fade-out').on('animationend', function() {
                $(this).removeClass('fade-out').html(currentText.heading).addClass('fade-in');
            });

            $('#dynamic-paragraph').addClass('fade-out').on('animationend', function() {
                $(this).removeClass('fade-out').html(currentText.paragraph).addClass('fade-in');
            });

            // Move to next text object in the array
            index = (index + 1) % textArray.length; // Cycle through the array
        }

        // Set interval to change the text every 5 seconds
        setInterval(updateContent, 7000);

        // Initial load of the content
        updateContent();
    });
</script>
<!-- Grid Section -->
<div id="grid-container" style="display: flex; flex-direction: column;height:auto;padding-bottom:20px;margin-top:0px">
</div>

<style>
    /* Same styles as provided earlier */
    /* You can keep your existing CSS code here, no changes needed */
</style>

<script>
    let oldData = [];

    // Skeleton Loading for both Marquee and Grid
    function buildSkeleton() {
        // Marquee Skeleton
        let marqueeSkeleton = `<div class="stock-marquee-wrapper"><div class="stock-marquee">`;
        for (let i = 0; i < 10; i++) {
            marqueeSkeleton += `
        <div class="stock-card">
            <div class="skeleton skeleton-logo"></div>
            <div class="info" style="display:flex;flex-direction:column;">
                <div class="skeleton skeleton-name"></div>
                <div class="skeleton skeleton-price"></div>
                <div class="skeleton skeleton-change"></div>
            </div>
        </div>`;
        }
        marqueeSkeleton += `</div></div>`;

        // Grid Skeleton
        let gridSkeleton = `<div class="container mt-4"><h3 class="mb-3" style="font-weight:700;color:#003939;">Top Bank Nifty,Sensex And Nifty 50 Stocks</h3><div class="row g-4">`;
        for (let i = 0; i < 12; i++) {
            gridSkeleton += `
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="stock-card-grid">
                <div class="d-flex align-items-center" style="gap:10px">
                    <div class="skeleton skeleton-grid-logo"></div>
                    <div  style="display:flex;flex-direction:column;">
                        <div class="skeleton skeleton-grid-name"></div>
                        <div class="skeleton skeleton-grid-price"></div>
                    </div>
                </div>
                <div class="skeleton skeleton-grid-change"></div>
            </div>
        </div>`;
        }
        gridSkeleton += `</div></div>`;

        // Inject Skeletons into their respective containers
        document.getElementById('marquee-container').innerHTML = marqueeSkeleton;
        document.getElementById('grid-container').innerHTML = gridSkeleton;
    }

    // Call skeleton initially
    buildSkeleton();

    // Function to build actual HTML for both Marquee and Grid after data arrives
    function buildStocksHTML(data) {
        // Build Marquee HTML
        let marqueeHTML = `<div class="stock-marquee-wrapper"><div class="stock-marquee" id="stock-marquee">`;
        data.concat(data).forEach((s, i) => {
            let d = s.data || {};
            let price = d.last_price?.value || 0;
            let change = d.change?.value || 0;
            let percent = d.percent_change?.value || 0;
            let up = change >= 0;
            let bg = up ? "#16c784" : "#ef5350";
            let sign = up ? "+" : "-";
            let logo = s.logo || 'https://via.placeholder.com/42?text=NA';

            marqueeHTML += `
        <div class="stock-card" id="marquee-${i}">
            <img src="${logo}" class="stock-logo">
            <div class="info">
                <p class="stock-name">${s.ticker}</p>
                <p class="stock-price" id="marquee-price-${i}">₹${price.toFixed(2)}</p>
                <span class="change-box" id="marquee-change-${i}" style="background:${bg}">
                    ${sign}${Math.abs(change)} | ${sign}${Math.abs(percent)}%
                </span>
            </div>
        </div>`;
        });
        marqueeHTML += `</div></div>`;

        // Build Grid HTML
        let gridHTML = `<div class="container mt-4"><h3 class="mb-3" style="font-weight:700;color:#003939;">Our Top Investment Share Bank Nifty,Sensex Nifty 50 With Option Trading And Forex Trading Also</h3><div class="row g-4">`;
        data.forEach((s, i) => {
            let d = s.data || {};
            let price = d.last_price?.value || 0;
            let change = d.change?.value || 0;
            let percent = d.percent_change?.value || 0;
            let up = change >= 0;
            let bg = up ? "#16c784" : "#ef5350";
            let sign = up ? "+" : "-";
            let logo = s.logo || 'https://via.placeholder.com/42?text=NA';

            gridHTML += `
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="stock-card-grid" id="grid-${i}">
                <div class="d-flex align-items-center" style="gap:10px">
                    <img src="${logo}" class="stock-logo-grid">
                    <div>
                        <div class="stock-name-grid">${s.ticker}</div>
                        <div class="stock-price-grid" id="grid-price-${i}">₹${price.toFixed(2)}</div>
                    </div>
                </div>
                <div class="stock-change-grid" id="grid-change-${i}" style="background:${bg}">
                    ${sign}${Math.abs(change)} | ${sign}${Math.abs(percent)}%
                </div>
            </div>
        </div>`;
        });
        gridHTML += `</div></div>`;

        // Inject both Marquee and Grid into respective containers
        document.getElementById('marquee-container').innerHTML = marqueeHTML;
        document.getElementById('grid-container').innerHTML = gridHTML;

        oldData = data;
    }

    // Function to update stocks data
    function updateStocks() {
        fetch('<?= site_url("nifty-json") ?>')
            .then(res => res.json())
            .then(data => {
                if (!data || data.length === 0) return;

                if (!oldData.length) {
                    buildStocksHTML(data);
                    return;
                }

                data.forEach((s, i) => {
                    let old = oldData[i] || {};
                    let oldD = old.data || {};
                    let d = s.data || {};

                    let price = d.last_price?.value || 0;
                    let change = d.change?.value || 0;
                    let percent = d.percent_change?.value || 0;
                    let up = change >= 0;
                    let bg = up ? "#16c784" : "#ef5350";
                    let sign = up ? "+" : "-";

                    // Update Marquee
                    if (oldD.last_price?.value !== price || oldD.change?.value !== change) {
                        document.getElementById(`marquee-price-${i}`).innerText = `₹${price.toFixed(2)}`;
                        let mc = document.getElementById(`marquee-change-${i}`);
                        mc.innerText = `${sign}${Math.abs(change)} | ${sign}${Math.abs(percent)}%`;
                        mc.style.background = bg;

                        // Update Grid
                        document.getElementById(`grid-price-${i}`).innerText = `₹${price.toFixed(2)}`;
                        let gc = document.getElementById(`grid-change-${i}`);
                        gc.innerText = `${sign}${Math.abs(change)} | ${sign}${Math.abs(percent)}%`;
                        gc.style.background = bg;

                        oldData[i] = s;
                    }
                });
            })
            .catch(err => console.error(err));
    }

    // Initial stock data update and set interval for continuous updates
    updateStocks();
    setInterval(updateStocks, 2000);
</script>