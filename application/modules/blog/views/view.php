<main class="main">
    <!-- Breadcrumbs -->
    <div class="site-breadcrumb" style="background: url(<?= base_url() ?>assets/img/breadcrumb/01.jpg)">
        <div class="container">
            <h1 class="breadcrumb-title"><?= @$query[0]->title ?></h1> <!-- Dynamic title -->
            <ul class="breadcrumb-menu">
                <li><a href="<?= site_url() ?>">Home</a></li>
                <li><a href="<?= site_url() ?>blog">Our Blog</a></li>
                <li class="active"><?= @$query[0]->title ?></li>

            </ul>
        </div>
    </div>
    <!-- Blog Single Post -->
    <div class="blog-single py-120">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="blog-single-wrap">
                        <div class="blog-single-content">
                            <!-- Blog Image -->
                            <div class="blog-thumb-img">
                                <?php if (@$query[0]->image && file_exists(FCPATH . 'assets/uploads/blog/' . @$query[0]->image)): ?>
                                    <img src="<?= base_url('assets/uploads/blog/' . @$query[0]->image) ?>" alt="<?= @$query[0]->title ?>">
                                <?php else: ?>
                                    <!-- Show static image if no image exists -->
                                    <img src="<?= base_url('assets/img/blog/bs-3.jpg') ?>" alt="Default Image">
                                <?php endif; ?>
                            </div>
                            <!-- Blog Info -->
                            <div class="blog-info">
                                <div class="blog-meta">
                                    <div class="blog-meta-left">
                                        <ul>
                                            <li><i class="fa-solid fa-calendar-days"></i><?= @$query[0]->timestamp ?></li>
                                            <li><i class="far fa-eye"></i><?= @$query[0]->views ?></li>
                                        </ul>
                                    </div>
                                    <!-- Share Button -->
                                    <div class="blog-meta-right">
                                        <a href="javascript:void(0);" class="share-link" data-bs-toggle="modal" data-bs-target="#shareModal"><i class="far fa-share-alt"></i> Share</a>
                                    </div>

                                    <!-- Bootstrap Modal Structure -->
                                    <div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="shareModalLabel">Share this post</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body row">
                                                    <div class="social-buttons">
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=YOUR_URL" target="_blank" class="social-btn facebook btn btn-primary w-100 mb-2">
                                                            <i class="fab fa-facebook-f"></i> Facebook
                                                        </a>
                                                        <a href="https://twitter.com/intent/tweet?url=YOUR_URL" target="_blank" class="social-btn twitter btn btn-info w-100 mb-2">
                                                            <i class="fab fa-twitter"></i> Twitter
                                                        </a>
                                                        <a href="https://api.whatsapp.com/send?text=YOUR_URL" target="_blank" class="social-btn whatsapp btn btn-success w-100 mb-2">
                                                            <i class="fab fa-whatsapp"></i> WhatsApp
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        var currentUrl = window.location.href;
                                        document.querySelectorAll('.social-btn').forEach(function(btn) {
                                            var shareUrl = btn.getAttribute('href');
                                            btn.setAttribute('href', shareUrl.replace('YOUR_URL', encodeURIComponent(currentUrl)));
                                        });
                                    </script>

                                </div>

                                <!-- Blog Details -->
                                <div class="blog-details">
                                    <h3 class="blog-details-title mb-20"><?= @$query[0]->title ?></h3>
                                    <p class="mb-10"><?= @$query[0]->description ?></p> <!-- Dynamic description/content -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <aside class="blog-sidebar">
                        <!-- Search Widget -->
                        <div class="widget recent-post">
                            <h5 class="widget-title">Recent Posts</h5>

                            <?php
                            $this->db->select('b_id, title, image, timestamp');
                            $this->db->order_by('b_id', 'desc');
                            $this->db->limit(5);
                            $recent_posts = $this->db->get('blog')->result_array();
                            ?>

                            <?php if (!empty($recent_posts)): ?>
                                <?php foreach ($recent_posts as $post): ?>
                                    <div class="recent-post-item">
                                        <div class="recent-post-img">
                                            <?php
                                            $imagePath = base_url() . "/assets/uploads/blog/" . $post['image'];
                                            $imageFilePath = FCPATH . 'assets/uploads/blog/' . $post['image'];

                                            if (empty($post['image']) || !file_exists($imageFilePath)) {
                                                $imagePath = base_url('assets/img/blog/bs-3.jpg');
                                            }
                                            ?>
                                            <img src="<?= $imagePath ?>" alt="thumb">
                                        </div>
                                        <div class="recent-post-info">
                                            <h6><a href="<?php echo $post['b_id']; ?>"><?php echo $post['title']; ?></a></h6>
                                            <span><i class="far fa-clock"></i> <?php echo date('M d, Y', strtotime($post['timestamp'])); ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <p>No recent posts available.</p>
                            <?php endif; ?>

                        </div>
                        <div class="widget social">
                            <h5 class="widget-title">Follow Us</h5>
                            <div class="social-link">
                                <a href="<?=$facebookhtml ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="<?=$twitterhtml ?>" target="_blank"><i class="fab fa-x-twitter"></i></a>
                                <a href="<?=$instagramhtml ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="<?= $youtubehtml ?>" target="_blank"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "BlogPosting",
    "headline": "<?= addslashes(@$query[0]->title) ?>",
    "image": [
        "<?php if (@$query[0]->image && file_exists(FCPATH . 'assets/uploads/blog/' . @$query[0]->image)): ?>
            <?= base_url('assets/uploads/blog/' . @$query[0]->image) ?>
        <?php else: ?>
            <?= base_url('assets/img/blog/bs-3.jpg') ?>
        <?php endif; ?>"
    ],
    "datePublished": "<?= date('c', strtotime(@$query[0]->date)) ?>",
    "dateModified": "<?= date('c', strtotime(@$query[0]->timestamp)) ?>",
    "author": {
        "@type": "Person",
        "name": "Admin"
    },
    "publisher": {
        "@type": "Organization",
        "name": "Jay Packers and Movers",
        "logo": {
            "@type": "ImageObject",
            "url": "<?= base_url('assets/img/logo/logo.png') ?>"
        }
    },
    "description": "<?= addslashes(substr(@$query[0]->description, 0, 160)) ?>",
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?= current_url() ?>"
    }
}
</script>