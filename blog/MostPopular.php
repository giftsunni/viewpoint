<section class="popular-news-area ptb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="popular-section-ads">
                    <a href="single-post-3.html"><img src="assets/img/2-ads.png" alt="image"></a>
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="section-title">
                    <h2>Most Popular</h2>
                </div>
                <style>
                    .news-image img {
                        width: 100%;
                        /* Or a specific width like 300px */
                        height: 200px;
                        /* Set the height you want */
                        object-fit: cover;
                        /* Ensures the image covers the box without distortion */
                    }
                </style>

                <div class="row">
                    <div class="popular-news-slides owl-carousel owl-theme">
                        <?php
                        // Database query to get all active and recent posts
                        $query_active_recent = "SELECT * FROM post WHERE dstatus = 'active' ORDER BY date DESC LIMIT 3";
                        $result = mysqli_query($conn, $query_active_recent);

                        // Check if posts are found
                        if (mysqli_num_rows($result) > 0) :
                            while ($post = mysqli_fetch_assoc($result)) :
                                // Prepare the post data
                                $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                                $title = htmlspecialchars($post['dtitle']);
                                $formatted_date = date('F j, Y', strtotime($post['date']));
                                $category = htmlspecialchars($post['category']);
                                $unique_id = htmlspecialchars($post['unique_id']);
                        ?>
                                <div class="col-lg-12 col-md-12">
                                    <div class="single-popular-news">
                                        <div class="news-image">
                                            <img src="<?= $image_path ?>" alt="image">
                                        </div>
                                        <div class="news-content">
                                            <h3><a href="singlepost?unique_id=<?= $unique_id ?>"><?= truncateText($title); ?></a></h3>
                                            <span><i class="icofont-calendar"></i> <?= $formatted_date ?></span>
                                        </div>
                                        <div class="tags bg-<?= rand(1, 6); ?>">
                                            <a href="postcategory?unique_id=<?= $unique_id ?>"><?= $category ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                        else :
                            ?>
                            <div class="alert__message error container">No active posts found</div>
                        <?php endif; ?>
                    </div>
                </div>



            </div>
        </div>
    </div>
</section>
