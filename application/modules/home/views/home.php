<!-- wrapper -->
<div id="smooth-wrapper" class="mil-wrapper">

    <!-- preloader -->
    <!-- <div class="mil-preloader">
            <div class="mil-load"></div>
            <p class="h2 mil-mb-30"><span class="mil-light mil-counter" data-number="100">100</span><span class="mil-light">%</span></p>
        </div> -->
    <!-- preloader end -->

    <!-- scroll progress -->
    <div class="mil-progress-track">
        <div class="mil-progress"></div>
    </div>
    <!-- scroll progress end -->

    <!-- back to top -->
    <div class="progress-wrap active-progress"></div>

    <!-- top panel end -->

    <!-- top panel end -->

    <!-- content -->
    <div id="smooth-content">



        <!-- banner -->
        <div class="mil-banner" style="height:100%!important; display:  flex; flex-direction: column;">
            <?php
            // 10 INDIAN STOCKS (STATIC SAMPLE DATA)
            $stocks = [
                [
                    "logo" => "https://logo.clearbit.com/relianceindustries.com",
                    "name" => "Reliance",
                    "price" => 2954.70,
                    "change" => +22.15,
                    "percent" => +0.76
                ],
                [
                    "logo" => "https://logo.clearbit.com/tcs.com",
                    "name" => "TCS",
                    "price" => 4125.20,
                    "change" => -18.80,
                    "percent" => -0.45
                ],
                [
                    "logo" => "https://logo.clearbit.com/hdfcbank.com",
                    "name" => "HDFC Bank",
                    "price" => 1542.65,
                    "change" => +12.30,
                    "percent" => +0.80
                ],
                [
                    "logo" => "https://logo.clearbit.com/infosys.com",
                    "name" => "Infosys",
                    "price" => 1642.10,
                    "change" => -8.40,
                    "percent" => -0.51
                ],
                [
                    "logo" => "https://logo.clearbit.com/icicibank.com",
                    "name" => "ICICI Bank",
                    "price" => 1081.50,
                    "change" => +5.75,
                    "percent" => +0.53
                ],
                [
                    "logo" => "https://logo.clearbit.com/hul.co.in",
                    "name" => "HUL",
                    "price" => 2510.30,
                    "change" => -12.25,
                    "percent" => -0.49
                ],
                [
                    "logo" => "https://logo.clearbit.com/kotak.com",
                    "name" => "Kotak Bank",
                    "price" => 1830.40,
                    "change" => +10.10,
                    "percent" => +0.56
                ],
                [
                    "logo" => "https://logo.clearbit.com/larsentoubro.com",
                    "name" => "L&T",
                    "price" => 3511.90,
                    "change" => +28.40,
                    "percent" => +0.82
                ],
                [
                    "logo" => "https://logo.clearbit.com/bajajauto.com",
                    "name" => "Bajaj Auto",
                    "price" => 7204.00,
                    "change" => -75.90,
                    "percent" => -1.04
                ],
                [
                    "logo" => "https://logo.clearbit.com/airtel.in",
                    "name" => "Airtel",
                    "price" => 1022.50,
                    "change" => +6.15,
                    "percent" => +0.61
                ],
            ];
            ?>

            <style>
                /* WRAPPER */
                .stock-marquee-wrapper {
                    width: 100%;
                    overflow: hidden;
                    padding: 20px 0;
                    background: #f6f9fc;
                    border-radius: 20px;
                    margin-bottom: 40px;
                }

                /* SCROLL TRACK */
                .stock-marquee {
                    display: flex;
                    gap: 20px;
                    animation: scroll-left 25s linear infinite;
                }

                /* CARD */
                .stock-card {
                    min-width: 230px;
                    background: #ffffff;
                    padding: 16px;
                    border-radius: 18px;
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    gap: 12px;
                    box-shadow: 0px 4px 18px rgba(0, 0, 0, 0.06);
                    border: 1px solid #e8eef1;
                }

                /* LOGO */
                .stock-logo {
                    width: 40px;
                    height: 40px;
                    border-radius: 8px;
                    object-fit: contain;
                    background: #fff;
                    padding: 5px;
                    border: 1px solid #eee;
                }

                /* INFO SECTION */
                .info {
                    flex: 1;
                }

                .stock-name {
                    font-size: 15px;
                    font-weight: 600;
                    color: #004d4d;
                    margin: 0;
                }

                .stock-price {
                    font-size: 16px;
                    font-weight: 700;
                    margin-top: 3px;
                    color: #333;
                }

                /* CHANGE SECTION */
                .change-box {
                    margin-top: 4px;
                    display: inline-block;
                    font-size: 13px;
                    font-weight: 600;
                    padding: 4px 8px;
                    border-radius: 8px;
                    color: #fff;
                }

                /* SMOOTH SCROLL */
                @keyframes scroll-left {
                    0% {
                        transform: translateX(0);
                    }

                    100% {
                        transform: translateX(-100%);
                    }
                }
                .mil-banner{
                    margin-top: 70px;
                }
                @media (max-width:900px){
                    margin-top: 10px;
                }
            </style>

            <div class="stock-marquee-wrapper">
                <div class="stock-marquee">

                    <?php foreach ($stocks as $s):
                        $up = $s['change'] >= 0;
                        $bg = $up ? "#16c784" : "#ef5350";
                        $sign = $up ? "+" : "";
                        ?>

                        <!-- CARD -->
                        <div class="stock-card">
                            <img src="<?= $s['logo'] ?>" class="stock-logo">

                            <div class="info">
                                <p class="stock-name"><?= $s['name'] ?></p>
                                <p class="stock-price">₹<?= number_format($s['price'], 2) ?></p>

                                <span class="change-box" style="background: <?= $bg ?>">
                                    <?= $sign . $s['change'] ?> | <?= $sign . $s['percent'] ?>%
                                </span>
                            </div>
                        </div>

                    <?php endforeach; ?>

                    <!-- DUPLICATE FOR INFINITE LOOP -->
                    <?php foreach ($stocks as $s):
                        $up = $s['change'] >= 0;
                        $bg = $up ? "#16c784" : "#ef5350";
                        $sign = $up ? "+" : "";
                        ?>
                        <div class="stock-card">
                            <img src="<?= $s['logo'] ?>" class="stock-logo">
                            <div class="info">
                                <p class="stock-name"><?= $s['name'] ?></p>
                                <p class="stock-price">₹<?= number_format($s['price'], 2) ?></p>
                                <span class="change-box" style="background: <?= $bg ?>">
                                    <?= $sign . $s['change'] ?> | <?= $sign . $s['percent'] ?>%
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
            <!-- STOCK CARDS GRID (Below Marquee) -->
            <style>
                .stock-card-grid {
                    background: #ffffff;
                    border-radius: 18px;
                    padding: 20px;
                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
                    border: 1px solid #e8eef1;
                    transition: 0.25s;
                }

                .stock-card-grid:hover {
                    transform: translateY(-4px);
                    box-shadow: 0 6px 26px rgba(0, 0, 0, 0.12);
                }

                .stock-logo-grid {
                    width: 42px;
                    height: 42px;
                    border-radius: 10px;
                    padding: 5px;
                    background: #fff;
                    border: 1px solid #eee;
                    object-fit: contain;
                }

                .stock-name-grid {
                    font-size: 17px;
                    font-weight: 600;
                    margin-top: 8px;
                    color: #003939;
                }

                .stock-price-grid {
                    font-size: 20px;
                    font-weight: 700;
                    margin-top: 5px;
                }

                .stock-change-grid {
                    font-size: 14px;
                    font-weight: 600;
                    padding: 5px 10px;
                    color: #fff;
                    border-radius: 8px;
                    display: inline-block;
                    margin-top: 6px;
                }
            </style>


            <div class="container mt-4">
                <h3 class="mb-3" style="font-weight:700;color:#003939;">Top 10 Indian Stocks</h3>

                <div class="row g-4">

                    <?php foreach ($stocks as $s):
                        $up = $s['change'] >= 0;
                        $bg = $up ? "#16c784" : "#ef5350";
                        $sign = $up ? "+" : "";
                        ?>

                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                            <div class="stock-card-grid">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="<?= $s['logo'] ?>" class="stock-logo-grid">
                                    <div>
                                        <div class="stock-name-grid"><?= $s['name'] ?></div>
                                        <div class="stock-price-grid">₹<?= number_format($s['price'], 2) ?></div>
                                    </div>
                                </div>

                                <div class="stock-change-grid" style="background: <?= $bg ?>">
                                    <?= $sign . $s['change'] ?> | <?= $sign . $s['percent'] ?>%
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>

        </div>

        <!-- <div class="mil-banner mil-dissolve">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6">
                        <div class="mil-banner-text">
                            <h6 class="mil-text-gradient-2 mil-mb-20">Grow Your Money Daily</h6>
                            <h1 class="mil-display mil-text-gradient-3 mil-mb-60">Your Ally for Financial Control</h1>
                            <div class="mil-buttons-frame">
                                <a href="<?= site_url() ?>register.html" class="mil-btn mil-md mil-add-arrow">Try
                                    demo</a>
                                <a href="<?= site_url() ?>https://www.youtube.com/watch?v=gRhoYxy9Oss"
                                    class="mil-btn mil-md mil-light mil-add-play has-popup-video">Watch tutorial</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="mil-banner-img">
                            <img src="<?= base_url() ?>assets/images/1.png" alt="banner"
                                style="max-width: 135%; transform: translateX(5%)">
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- banner end -->

        <!-- brands -->
        <div class="mil-brands mil-p-160-160">
            <div class="container">
                <h5 class="mil-text-center mil-soft mil-mb-60 mil-up">Join over 7,000 satisfied customers who enjoy our
                    service!</h5>
                <div class="row justify-content-center">
                    <div class="col-3 col-md-2 mil-text-center">
                        <div class="mil-brand">
                            <img src="<?= base_url() ?>assets/images/1.svg" alt="brand" class="mil-up">
                        </div>
                    </div>
                    <div class="col-3 col-md-2 mil-text-center">
                        <div class="mil-brand">
                            <img src="<?= base_url() ?>assets/images/2.svg" alt="brand" class="mil-up">
                        </div>
                    </div>
                    <div class="col-3 col-md-2 mil-text-center">
                        <div class="mil-brand">
                            <img src="<?= base_url() ?>assets/images/3.svg" alt="brand" class="mil-up">
                        </div>
                    </div>
                    <div class="col-3 col-md-2">
                        <div class="mil-brand mil-text-center">
                            <img src="<?= base_url() ?>assets/images/4.svg" alt="brand" class="mil-up">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brands end -->

        <!-- features -->


        <!-- call to action -->
        <div class="mil-cta mil-up">
            <div class="container">
                <div class="mil-out-frame mil-visible mil-illustration-fix mil-p-160-0">
                    <div class="row align-items-end">
                        <div class="mil-text-center">
                            <h2 class="mil-mb-30 mil-up">Protected coverage on your <br>purchases with Plax Standard
                            </h2>
                            <p class="mil-text-m mil-soft mil-mb-60 mil-up">Enjoy instant coverage against theft or
                                accidental damage <br>for the first forty-five (45) days from the date of purchase.</p>
                        </div>
                    </div>
                    <div class="mil-illustration-absolute mil-up">
                        <img src="<?= base_url() ?>assets/images/3.png" alt="illustration">
                    </div>
                </div>
            </div>
        </div>
        <!-- call to action end -->

        <!-- icon boxes -->

        <!-- icon boxes end -->

        <!-- call to action -->




        <!-- testimonials -->
        <div class="mil-testimonials mil-p-0-160">
            <div class="container">
                <div class="swiper-container mil-testimonials-2 mil-up">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <blockquote class="mil-with-bg">
                                <svg width="50" height="32" viewBox="0 0 50 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="mil-mb-30 mil-up mil-accent">
                                    <path
                                        d="M13.0425 9.59881C13.734 7.27646 15.0099 5.16456 16.7515 3.45982C17.0962 3.11455 17.2958 2.65336 17.31 2.16891C17.3243 1.68445 17.1523 1.2126 16.8285 0.848135L16.6225 0.619235C16.3552 0.313531 15.9908 0.106228 15.5887 0.0311485C15.1866 -0.0439312 14.7706 0.0176452 14.4085 0.205827C-0.299477 8.01918 -0.116489 18.6169 0.0295105 20.4165C0.0195105 20.6139 -0.000488281 20.8112 -0.000488281 21.0085C0.0518962 23.1543 0.724816 25.2405 1.93898 27.0214C3.15314 28.8023 4.85796 30.2037 6.85252 31.0604C8.84709 31.9171 11.0483 32.1935 13.1967 31.8569C15.3452 31.5203 17.3514 30.5848 18.9788 29.1606C20.6063 27.7364 21.7873 25.8829 22.3826 23.8185C22.9779 21.7541 22.9627 19.5648 22.3389 17.5086C21.715 15.4524 20.5085 13.615 18.8614 12.2129C17.2144 10.8108 15.1954 9.90246 13.0425 9.59487V9.59881Z"
                                        fill="#03A6A6"></path>
                                    <path
                                        d="M40.2255 9.59881C40.9171 7.27648 42.193 5.16459 43.9345 3.45982C44.2793 3.11455 44.4788 2.65336 44.4931 2.16891C44.5074 1.68445 44.3353 1.2126 44.0115 0.848135L43.8055 0.619235C43.5382 0.313531 43.1738 0.106228 42.7717 0.0311485C42.3696 -0.0439312 41.9536 0.0176452 41.5915 0.205827C26.8835 8.01918 27.0665 18.6169 27.2115 20.4165C27.2015 20.6139 27.1815 20.8112 27.1815 21.0085C27.2332 23.1544 27.9055 25.241 29.1191 27.0224C30.3328 28.8038 32.0373 30.2057 34.0318 31.063C36.0262 31.9203 38.2274 32.1972 40.3761 31.8611C42.5248 31.525 44.5313 30.5899 46.1591 29.166C47.787 27.742 48.9684 25.8887 49.5641 23.8242C50.1599 21.7598 50.1451 19.5704 49.5215 17.514C48.8979 15.4576 47.6915 13.6199 46.0445 12.2176C44.3975 10.8152 42.3785 9.90659 40.2255 9.59881Z"
                                        fill="#03A6A6"></path>
                                </svg>
                                <p class="mil-text-m mil-mb-30 mil-up">I had never felt so connected to my finances. The
                                    instant alerts from Plax keep me informed in real time, giving me a feeling of total
                                    control. But the result, the lion needs to drink members.</p>
                                <div class="mil-customer">
                                    <img src="<?= base_url() ?>assets/images/1.jpg" alt="Customer" class="mil-up">
                                    <h6 class="mil-up">Rüdiger Karlsen</h6>
                                </div>
                            </blockquote>
                        </div>
                        <div class="swiper-slide">
                            <blockquote class="mil-with-bg">
                                <svg width="50" height="32" viewBox="0 0 50 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="mil-mb-30 mil-up mil-accent">
                                    <path
                                        d="M13.0425 9.59881C13.734 7.27646 15.0099 5.16456 16.7515 3.45982C17.0962 3.11455 17.2958 2.65336 17.31 2.16891C17.3243 1.68445 17.1523 1.2126 16.8285 0.848135L16.6225 0.619235C16.3552 0.313531 15.9908 0.106228 15.5887 0.0311485C15.1866 -0.0439312 14.7706 0.0176452 14.4085 0.205827C-0.299477 8.01918 -0.116489 18.6169 0.0295105 20.4165C0.0195105 20.6139 -0.000488281 20.8112 -0.000488281 21.0085C0.0518962 23.1543 0.724816 25.2405 1.93898 27.0214C3.15314 28.8023 4.85796 30.2037 6.85252 31.0604C8.84709 31.9171 11.0483 32.1935 13.1967 31.8569C15.3452 31.5203 17.3514 30.5848 18.9788 29.1606C20.6063 27.7364 21.7873 25.8829 22.3826 23.8185C22.9779 21.7541 22.9627 19.5648 22.3389 17.5086C21.715 15.4524 20.5085 13.615 18.8614 12.2129C17.2144 10.8108 15.1954 9.90246 13.0425 9.59487V9.59881Z"
                                        fill="#03A6A6"></path>
                                    <path
                                        d="M40.2255 9.59881C40.9171 7.27648 42.193 5.16459 43.9345 3.45982C44.2793 3.11455 44.4788 2.65336 44.4931 2.16891C44.5074 1.68445 44.3353 1.2126 44.0115 0.848135L43.8055 0.619235C43.5382 0.313531 43.1738 0.106228 42.7717 0.0311485C42.3696 -0.0439312 41.9536 0.0176452 41.5915 0.205827C26.8835 8.01918 27.0665 18.6169 27.2115 20.4165C27.2015 20.6139 27.1815 20.8112 27.1815 21.0085C27.2332 23.1544 27.9055 25.241 29.1191 27.0224C30.3328 28.8038 32.0373 30.2057 34.0318 31.063C36.0262 31.9203 38.2274 32.1972 40.3761 31.8611C42.5248 31.525 44.5313 30.5899 46.1591 29.166C47.787 27.742 48.9684 25.8887 49.5641 23.8242C50.1599 21.7598 50.1451 19.5704 49.5215 17.514C48.8979 15.4576 47.6915 13.6199 46.0445 12.2176C44.3975 10.8152 42.3785 9.90659 40.2255 9.59881Z"
                                        fill="#03A6A6"></path>
                                </svg>
                                <p class="mil-text-m mil-mb-30 mil-up">Plax Standard has proven to be more than a card;
                                    it is my financial defender. Proactive alerts give me confidence that my security is
                                    in good hands.</p>
                                <div class="mil-customer">
                                    <img src="<?= base_url() ?>assets/images/2.jpg" alt="Customer" class="mil-up">
                                    <h6 class="mil-up">Branka Berg</h6>
                                </div>
                            </blockquote>
                        </div>
                        <div class="swiper-slide">
                            <blockquote class="mil-with-bg">
                                <svg width="50" height="32" viewBox="0 0 50 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="mil-mb-30 mil-up mil-accent">
                                    <path
                                        d="M13.0425 9.59881C13.734 7.27646 15.0099 5.16456 16.7515 3.45982C17.0962 3.11455 17.2958 2.65336 17.31 2.16891C17.3243 1.68445 17.1523 1.2126 16.8285 0.848135L16.6225 0.619235C16.3552 0.313531 15.9908 0.106228 15.5887 0.0311485C15.1866 -0.0439312 14.7706 0.0176452 14.4085 0.205827C-0.299477 8.01918 -0.116489 18.6169 0.0295105 20.4165C0.0195105 20.6139 -0.000488281 20.8112 -0.000488281 21.0085C0.0518962 23.1543 0.724816 25.2405 1.93898 27.0214C3.15314 28.8023 4.85796 30.2037 6.85252 31.0604C8.84709 31.9171 11.0483 32.1935 13.1967 31.8569C15.3452 31.5203 17.3514 30.5848 18.9788 29.1606C20.6063 27.7364 21.7873 25.8829 22.3826 23.8185C22.9779 21.7541 22.9627 19.5648 22.3389 17.5086C21.715 15.4524 20.5085 13.615 18.8614 12.2129C17.2144 10.8108 15.1954 9.90246 13.0425 9.59487V9.59881Z"
                                        fill="#03A6A6"></path>
                                    <path
                                        d="M40.2255 9.59881C40.9171 7.27648 42.193 5.16459 43.9345 3.45982C44.2793 3.11455 44.4788 2.65336 44.4931 2.16891C44.5074 1.68445 44.3353 1.2126 44.0115 0.848135L43.8055 0.619235C43.5382 0.313531 43.1738 0.106228 42.7717 0.0311485C42.3696 -0.0439312 41.9536 0.0176452 41.5915 0.205827C26.8835 8.01918 27.0665 18.6169 27.2115 20.4165C27.2015 20.6139 27.1815 20.8112 27.1815 21.0085C27.2332 23.1544 27.9055 25.241 29.1191 27.0224C30.3328 28.8038 32.0373 30.2057 34.0318 31.063C36.0262 31.9203 38.2274 32.1972 40.3761 31.8611C42.5248 31.525 44.5313 30.5899 46.1591 29.166C47.787 27.742 48.9684 25.8887 49.5641 23.8242C50.1599 21.7598 50.1451 19.5704 49.5215 17.514C48.8979 15.4576 47.6915 13.6199 46.0445 12.2176C44.3975 10.8152 42.3785 9.90659 40.2255 9.59881Z"
                                        fill="#03A6A6"></path>
                                </svg>
                                <p class="mil-text-m mil-mb-30 mil-up">The detailed notification history in the App
                                    gives me a complete view of my financial activity. It's like having a personal
                                    security assistant always.</p>
                                <div class="mil-customer">
                                    <img src="<?= base_url() ?>assets/images/3.jpg" alt="Customer" class="mil-up">
                                    <h6 class="mil-up">Karl Andreassen</h6>
                                </div>
                            </blockquote>
                        </div>
                        <div class="swiper-slide">
                            <blockquote class="mil-with-bg">
                                <svg width="50" height="32" viewBox="0 0 50 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" class="mil-mb-30 mil-up mil-accent">
                                    <path
                                        d="M13.0425 9.59881C13.734 7.27646 15.0099 5.16456 16.7515 3.45982C17.0962 3.11455 17.2958 2.65336 17.31 2.16891C17.3243 1.68445 17.1523 1.2126 16.8285 0.848135L16.6225 0.619235C16.3552 0.313531 15.9908 0.106228 15.5887 0.0311485C15.1866 -0.0439312 14.7706 0.0176452 14.4085 0.205827C-0.299477 8.01918 -0.116489 18.6169 0.0295105 20.4165C0.0195105 20.6139 -0.000488281 20.8112 -0.000488281 21.0085C0.0518962 23.1543 0.724816 25.2405 1.93898 27.0214C3.15314 28.8023 4.85796 30.2037 6.85252 31.0604C8.84709 31.9171 11.0483 32.1935 13.1967 31.8569C15.3452 31.5203 17.3514 30.5848 18.9788 29.1606C20.6063 27.7364 21.7873 25.8829 22.3826 23.8185C22.9779 21.7541 22.9627 19.5648 22.3389 17.5086C21.715 15.4524 20.5085 13.615 18.8614 12.2129C17.2144 10.8108 15.1954 9.90246 13.0425 9.59487V9.59881Z"
                                        fill="#03A6A6"></path>
                                    <path
                                        d="M40.2255 9.59881C40.9171 7.27648 42.193 5.16459 43.9345 3.45982C44.2793 3.11455 44.4788 2.65336 44.4931 2.16891C44.5074 1.68445 44.3353 1.2126 44.0115 0.848135L43.8055 0.619235C43.5382 0.313531 43.1738 0.106228 42.7717 0.0311485C42.3696 -0.0439312 41.9536 0.0176452 41.5915 0.205827C26.8835 8.01918 27.0665 18.6169 27.2115 20.4165C27.2015 20.6139 27.1815 20.8112 27.1815 21.0085C27.2332 23.1544 27.9055 25.241 29.1191 27.0224C30.3328 28.8038 32.0373 30.2057 34.0318 31.063C36.0262 31.9203 38.2274 32.1972 40.3761 31.8611C42.5248 31.525 44.5313 30.5899 46.1591 29.166C47.787 27.742 48.9684 25.8887 49.5641 23.8242C50.1599 21.7598 50.1451 19.5704 49.5215 17.514C48.8979 15.4576 47.6915 13.6199 46.0445 12.2176C44.3975 10.8152 42.3785 9.90659 40.2255 9.59881Z"
                                        fill="#03A6A6"></path>
                                </svg>
                                <p class="mil-text-m mil-mb-30 mil-up">The detailed notification history in the App
                                    gives me a complete view of my financial activity. It's like having a personal
                                    security assistant always.</p>
                                <div class="mil-customer">
                                    <img src="<?= base_url() ?>assets/images/2.jpg" alt="Customer" class="mil-up">
                                    <h6 class="mil-up">Bett Nilsen</h6>
                                </div>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="mil-testi-pagination mil-up"></div>
            </div>
        </div>
        <!-- testimonials end -->

        <!-- call to action -->
        <div class="mil-cta mil-up">
            <div class="container">
                <div class="mil-out-frame mil-visible mil-image mil-illustration-fix mil-p-160-0">
                    <div class="row align-items-end">
                        <div class="mil-text-center">
                            <h2 class="mil-mb-30 mil-light mil-up">Buy with Confidence, Guaranteed <br>Protection for
                                your purchases</h2>
                            <p class="mil-text-m mil-dark-soft mil-mb-60 mil-up">Discover how we make each purchase a
                                safe and reliable <br>experience for you.</p>
                            <div class="mil-up mil-mb-60"><a href="<?= site_url() ?>#."
                                    class="mil-btn mil-button-transform mil-md mil-add-arrow">Protect My Purchases</a>
                            </div>
                        </div>
                    </div>
                    <div class="mil-illustration-absolute mil-type-2 mil-up">
                        <img src="<?= base_url() ?>assets/images/6.png" alt="illustration">
                    </div>
                </div>
            </div>
        </div>
        <!-- call to action end -->

        <!-- footer -->

        <!-- footer end -->

    </div>
    <!-- content end -->
</div>