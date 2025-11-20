<main class="main">
    <div class="site-breadcrumb" style="background: url(<?= base_url() ?>assets/img/breadcrumb/01.jpg)">
        <div class="container">
            <h1 class="breadcrumb-title">Jay Packers and Movers All Branches</h1>
            <ul class="breadcrumb-menu">
                <li><a href="<?= site_url() ?>">Home</a></li>
                <li class="active">Our Branches</li>
            </ul>
        </div>
    </div>
    <?php
    $state = [
        [
            "image" => "bihar.jpg",
            "category" => "Bihar",
            "title" => "Packers and Movers",
            "link" => "bihar"
        ],
    ];
    ?>
    <div class="portfolio-area py-120">
        <div class="container">
            <div class="row popup-gallery">
                <?php foreach ($state as $item): ?>
                    <div class="col-6 col-lg-3 mb-4">
                        <div class="portfolio-item">
                            <div class="portfolio-img">
                                <img class="img-fluid" src="<?= base_url() ?>/assets/img/state/<?= $item['image'] ?>" alt="<?= $item['title'] ?>">
                                <a class="portfolio-link" href="<?= $item['link'] ?>">
                                    <i class="far fa-plus"></i>
                                </a>
                            </div>
                            <div class="portfolio-content">
                                <div class="portfolio-info">
                                    <small><?= $item['category'] ?></small>
                                    <h4><a href="<?= $item['link'] ?>"><?= $item['title'] ?></a></h4>
                                </div>
                                <a href="<?= $item['link'] ?>" class="portfolio-arrow"><i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</main>