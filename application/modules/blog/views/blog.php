<?php
// Ensure no output or whitespace before this PHP block
$this->load->database();
?>
<main class="main">
    <div class="site-breadcrumb" style="background: url(<?= base_url() ?>assets/img/breadcrumb/01.jpg)">
        <div class="container">
            <h1 class="breadcrumb-title">Our Blog</h1>
            <ul class="breadcrumb-menu">
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li class="active">Our Blog</li>
            </ul>
        </div>
    </div>

    <div class="blog-area py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center wow fadeInDown" data-wow-delay=".25s">
                        <span class="site-title-tagline"><i class="fas fa-truck-container"></i> Our Blog</span>
                        <h2 class="site-title">Our Latest News & <span>Blog</span></h2>
                        <div class="heading-divider"></div>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <?php
                $query = $this->db->get('blog'); 
                $schemaData = []; // Initialize the schema data array

                foreach ($query->result() as $b):
                    $titleUrlEncoded = rtrim(str_replace("--", "-", urlencode(str_replace(" ", "-", str_replace(",", " ", $b->title)))), "-");
                    $link = strtolower(site_url('blog/read/' . $titleUrlEncoded . '/' . $b->b_id));

                    $img = $b->image ? base_url("assets/uploads/blog/{$b->image}") : base_url('assets/img/blog/bs-3.jpg');

                    // Handle date parsing with specified format
                    try {
                        $date = DateTime::createFromFormat('d/m/Y', $b->date);
                        if (!$date) {
                            throw new Exception("Invalid date format");
                        }
                        $day = $date->format('d');
                        $month = $date->format('M');
                    } catch (Exception $e) {
                        $day = '--';
                        $month = '--';
                    }

                    $schemaData[] = [
                        "@context" => "https://schema.org",
                        "@type" => "BlogPosting",
                        "headline" => $b->title,
                        "image" => $img,
                        "datePublished" => $b->date,
                        "author" => [
                            "@type" => "Person",
                            "name" => "Admin"
                        ],
                        "publisher" => [
                            "@type" => "Organization",
                            "name" => "Jay Packers and Movers",
                            "logo" => [
                                "@type" => "ImageObject",
                                "url" => base_url('assets/img/logo/logo.png')
                            ]
                        ],
                        "description" => implode(' ', array_slice(explode(' ', $b->description), 0, 15)) . '...'
                    ];
                ?>
                <div class="col-md-6 col-lg-4">
                    <div class="blog-item wow fadeInUp shadow " data-wow-delay=".25s">
                        <div class="blog-item-img">
                            <img src="<?= $img ?>" alt="<?= $b->title ?>">
                            <div class="blog-date">
                                <strong><?= $day ?></strong>
                                <span><?= $month ?></span>
                            </div>
                        </div>
                        <div class="blog-item-info">
                            <div class="blog-item-meta">
                                <ul>
                                    <li><a href="<?= $link ?>"><i class="far fa-user-circle"></i> By Admin</a></li>
                                    <li><a href="<?= $link ?>"><i class="far fa-eye"></i> <?= $b->views ?> Views</a></li>
                                </ul>
                            </div>
                            <h4 class="blog-title">
                                <a href="<?= $link ?>"><?= $b->title ?></a>
                            </h4>
                            <p>
                                <?= implode(' ', array_slice(explode(' ', $b->description), 0, 15)) ?>...
                            </p>
                            <a class="theme-btn" href="<?= $link ?>">Read More<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</main>  

<script type="application/ld+json">
<?= json_encode($schemaData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
</script>
