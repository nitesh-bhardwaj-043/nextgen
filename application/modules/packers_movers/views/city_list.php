<?php
$st = strtolower(str_replace(" ", "-", $state));
include "data/$st.php";
$state = ucwords($state);
?>

<main class="main">
<div class="site-breadcrumb" style="background:url(<?= base_url() ?>assets/img/state/breadcrumb/<?=strtolower($state)?>.png)">
        <div class="container">
            <h1 class="breadcrumb-title">Packers and Movers in <?= $state ?>, India</h1>
            <ul class="breadcrumb-menu">
                <li><a href="<?= site_url() ?>">Home</a></li>
                <li><a href="<?= site_url('our-branches') ?>">Our Branches</a></li>
                <li style="color:red;"><?= $state ?></li>
            </ul>
        </div>
    </div>
    <div class="our-service-page" style="background-image:url('<?= base_url() ?>assets/images/location/location-background.png'); background-size: cover; background-repeat: no-repeat; background-position: center; padding: 40px 0;min-height:500px;">
    <div class="container feature-content-section">
        <div class="row">
            <?php
            $st = str_replace(" ", "-", $state);
            foreach ($cities as $ct) :
                $link = urlencode(strtolower(str_replace(" ", "-", $ct['nm'])));
                $statename = urlencode(strtolower(str_replace(" ", "-", $st)));
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4">
                    <a href="<?= site_url("$statename/packers-movers-$link") ?>" class="city-card-link d-block h-100 text-decoration-none">
                        <div class="city-card card border-0 shadow h-100">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <!-- Truck Icon on Left -->
                                <div class="icon">
                                <img src="<?=base_url()?>/assets/img/icon/delivery.svg" style="width:50px;" alt="<?= $ct['nm'] ?>">
                                </div>
                                <!-- Title on Right -->
                                <div class="city-name">
                                    <h5>Packers and Movers <b><?= $ct['nm'] ?></b></h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</main>
<style>
.our-service-page {
    background-attachment: fixed;
    padding: 40px 0;
}



.city-card {
    border-radius: 10px;
    background-color: #ffffff;
    transition: all 0.3s ease;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    cursor: pointer; 
    transform: translateY(0); 
}

.city-card:hover {
    background-color: #f8f9fa; 
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15); 
    transform: translateY(-10px); 
}

.card-body {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding:5px;
}


.city-name h5 {
    font-size: 15px;
    font-weight: bold;
    color: #333;
    margin-left:15px;
}

.city-card:hover .icon-container i {
    color: #007bff; 
}

@media (max-width: 576px) {
    .city-name h5 {
        font-size: 10px;
    }

    .icon-container i {
        font-size: 2rem;
    }
}

</style>