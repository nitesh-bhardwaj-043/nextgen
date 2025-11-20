<main class="main">
  <div class="site-breadcrumb" style="background: url(<?= base_url() ?>assets/img/breadcrumb/01.jpg)">
    <div class="container">
      <h1 class="breadcrumb-title">Why Choose Us</h1>
      <ul class="breadcrumb-menu">
        <li><a href="<?= site_url() ?>">Home</a></li>
        <li class="active">Why Choose Us</li>
      </ul>
    </div>
  </div>
  <div class="about-area py-120">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="about-left wow fadeInLeft" data-wow-delay=".25s">
            <?php $this->load->view('contacts/quoteform.php') ?>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="about-right wow fadeInUp" data-wow-delay=".25s">
            <div class="site-heading mb-3">
              <h2 class="site-title">Why Choose <?= $company3 ?>?</h2>
            </div>
            <p class="about-text"><?= $company3 ?> are well-established companies providing packing and moving services in Patna. From our vast years of experience, we cater for our clients' packing and moving services and guarantee the safety of your valued items.
            </p>
            <p class="about-text">Our experienced packers and movers utilize quality packing materials, proper packaging and handling methods and clean and properly equipped vehicles to afford our clients a deserving and smooth move. Whether you are packing and moving to a new house within the same community, or to the next town, we offer timely, efficient and cost-effective services.
            </p>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="about-content">
            <div class="row g-3">
              <div class="col-lg-12">
                <h3>Benefits of Choosing <?= $company3 ?></h3>
              </div>
              <div class="col-md-6">
                <div class="about-item">
                  <div class="icon">
                    <img src="<?= base_url() ?>assets/img/icon/team.svg" alt="">
                  </div>
                  <div class="content">
                    <h6>Professional Expertise</h6>
                    <p>Our team includes experienced packers and movers who have been in the field for several years now.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="about-item">
                  <div class="icon">
                    <img src="<?= base_url() ?>assets/img/icon/package.svg" alt="">
                  </div>
                  <div class="content">
                    <h6>High-Quality Packing Materials</h6>
                    <p>It works great when you add your normal packing materials with more durable and secure ones so that your item gets more protection.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="about-item">
                  <div class="icon">
                    <img src="<?= base_url() ?>assets/img/icon/delivery.svg" alt="">
                  </div>
                  <div class="content">
                    <h6>Timely Delivery</h6>
                    <p>Timely pickups and drops hence giving a comfortable moving experience.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="about-item">
                  <div class="icon">
                    <img src="<?= base_url() ?>assets/img/icon/money.svg" alt="">
                  </div>
                  <div class="content">
                    <h6>Affordable Pricing</h6>
                    <p>Solutions that are cheap but do not affect the quality of service.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="about-item">
                  <div class="icon">
                    <img src="<?= base_url() ?>assets/img/icon/pickup.svg" alt="">
                  </div>
                  <div class="content">
                    <h6>Comprehensive Services</h6>
                    <p>All manner of moving services, from packing, loading, transporting and even unpacking.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="about-item">
                  <div class="icon">
                    <img src="<?= base_url() ?>assets/img/icon/certified.svg" alt="">
                  </div>
                  <div class="content">
                    <h6>Safe Transportation</h6>
                    <p>Clean cars for safe and secure ride to and from:
                      Goods.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>