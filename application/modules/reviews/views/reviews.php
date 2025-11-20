<main class="main">
    <div class="site-breadcrumb" style="background: url(<?= base_url() ?>assets/img/breadcrumb/01.jpg)">
        <div class="container">
            <h2 class="breadcrumb-title">Our Reviews</h2>
            <ul class="breadcrumb-menu">
                <li><a href="<?= site_url() ?>">Home</a></li>
                <li class="active">Reviews</li>
            </ul>
        </div>
    </div>

    <div class="our-service-page feature-content-section" style="min-height: 50vh; background-image: url('assets/images/location/location-background.png'); background-size: cover; background-repeat: no-repeat; background-position: center; padding-top: 15px; padding-bottom: 15px;">
        <div ng-app="reviewsApp" ng-controller="reviewsctrl">
            <?php $this->load->view('reviews/reviewmodal') ?>
            <br />
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 offset-sm-3 mb-4 text-left fade-in">
                        <button type="button" class="btn write-review-btn" data-bs-toggle="modal" data-bs-target="#rvwmdl">
                            Write a Review <i class="fas fa-pen"></i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <?php
                    if ($reviews->num_rows() == 0) {
                        echo "<p class='no-reviews-text'>No reviews yet...</p>";
                    } else {
                        foreach ($reviews->result() as $r) {
                            $pdate = explode(" ", $r->posted_date)[0];
                            $size = strlen(explode("@", $r->email)[0]) - 4;
                            $lem = substr($r->email, -12);
                            $fem = substr($r->email, 0, 4);
                            $st = str_repeat("*", $size);
                            $em = $fem . $st . $lem;
                    ?>
                            <div class="col-lg-6 col-md-6 fade-in">
                                <div class="single-review" itemprop="review" itemscope itemtype="https://schema.org/Review">
                                    <meta itemprop="name" content="<?= $r->r_title ?>" />
                                    <div itemprop="itemReviewed" itemscope itemtype="https://schema.org/LocalBusiness">
                                        <meta itemprop="name" content="<?= $company3 ?>" />
                                    </div>
                                    <?php if (@$r->r_img) { ?>
                                        <div class="review-icon">
                                            <img class="review-img" src="<?= base_url('assets/uploads/reviewimg/thumb/') . $r->r_img ?>" alt="<?= $r->name ?> review <?= $company3 ?>">
                                        </div>
                                    <?php } ?>
                                    <div class="review-content">
                                        <p class="review-author">
                                            By <span class="author-name" itemprop="author" itemscope itemtype="https://schema.org/Person">
                                                <span itemprop="name"><?= $r->name ?></span>
                                            </span>
                                            <span class="review-date" itemprop="datePublished" content="<?= $pdate ?>"> (<?= $r->posted_date ?>)</span>
                                        </p>
                                        <div class="review-rating">
                                            <?php for ($i = 0; $i < $r->stars; $i++) { ?>
                                                <i class="text-warning fa fa-star"></i>
                                            <?php } ?>
                                            <span class="rating-value" itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating">
                                                <span itemprop="ratingValue"><?= $r->stars ?></span> stars
                                            </span>
                                        </div>
                                        <h4 class="review-title"><q itemprop="name"><?= $r->r_title ?></q></h4>
                                        <p class="review-body" itemprop="reviewBody"><?=$r->r_desc?></p>
                                        <p class="review-email"><small><?= $em ?></small></p>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>
                    <div class="col-lg-12">
                        <div class="pagination">
                            <?php echo $this->pagination->create_links() ?>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>

</main>
<style>
    /* Global Container */
    .our-service-page {
        padding: 30px 0;
        color: #000;
    }

    .fade-in {
        visibility: visible;
        animation: fadeInUp 0.6s ease-in-out;
    }
    .btn:hover {
        background-color: #000;
        color:white;
    }
    /* Button Styling */
    .write-review-btn {
        background-color: #e21b22;
        color: #fff;
        border: none;
        width: 100%;
        font-size: 1rem;
        font-weight: bold;
        border-radius: 5px;
        padding: 10px;
    }

    /* Review Container */
    .single-review {
        display: flex;
        flex-direction: column;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 15px;
        margin-bottom: 15px;
        transition: transform 0.3s ease;
        position: relative;
    }

    .single-review:hover {
        transform: scale(1.02);
    }

    .review-icon {
        align-self: center;
        max-width: 70px;
        margin-bottom: 10px;
    }

    .review-img {
        width: 100%;
        border-radius: 50%;
    }

    /* Review Content */
    .review-content {
        flex-grow: 1;
    }

    .review-author {
        color: #f4854a;
        font-size: 0.9rem;
    }

    .author-name {
        background-color: #000;
        padding: 3px;
        border-radius: 5px;
        color: #fff;
    }

    .review-date {
        color: #555;
        font-size: 0.8rem;
    }

    .review-rating {
        margin-top: 10px;
    }

    .rating-value {
        color: #000;
        font-weight: bold;
    }

    .review-title {
        font-weight: bold;
        color: #000;
        margin-top: 5px;
        font-size: 1.1rem;
    }

    .review-body {
        color: #000;
        margin: 5px 0;
    }

    .review-email {
        font-weight: bold;
        color: #555;
    }

    .no-reviews-text {
        color: #888;
        text-align: center;
        font-size: 1.2rem;
        margin: 20px auto;
    }

    /* Read More Button */
    .read-more-btn {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 8px 12px;
        font-size: 0.9rem;
        margin-top: 10px;
        cursor: pointer;
        align-self: flex-start;
        transition: background-color 0.3s;
    }

    .read-more-btn:hover {
        background-color: #0056b3;
    }
</style>