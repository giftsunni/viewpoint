<section class="international-news-area pb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="section-title">
                    <h2>International</h2>
                </div>
                <style>
                    .fixed-size-image {
                        width: 300px;
                        height: 200px;
                        object-fit: cover;
                    }
                </style>
                <div class="international-news-inner">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php
                            $query_active = "SELECT * FROM post WHERE dstatus = 'active' AND category != 'Business' ORDER BY RAND() LIMIT 1";
                            $active_posts = mysqli_query($conn, $query_active); ?>
                            <div class="single-international-news">
                                <?php if (mysqli_num_rows($active_posts) > 0) : ?>
                                    <?php while ($post = mysqli_fetch_assoc($active_posts)) :
                                        $post_date = $post['date'];
                                        $post_date_time = new DateTime($post_date);
                                        $formatted_date = $post_date_time->format('F j, Y');
                                        $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                                    ?>
                                        <div class="news-image"><img class="fixed-size-image" src="<?= $image_path ?>" alt="image"></div>
                                        <div class="news-content">
                                            <span><i class="icofont-calendar"></i> <?= $formatted_date ?></span>
                                            <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                        </div>
                                    <?php endwhile; ?>
                                <?php else : ?>
                                    <div class="alert__message error container">No active posts found</div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6">

                            <style>
                                .news-media img {
                                    width: 100px;
                                    height: 100px;
                                    object-fit: cover;
                                }
                            </style>

                            <div class="international-news-list">
                                <?php
                                // Database query to get posts where category is 'Sport', limit 3
                                $query_sport = "SELECT * FROM post WHERE category = 'Sports' ORDER BY RAND() LIMIT 3";
                                $result_sport = mysqli_query($conn, $query_sport);

                                // Check if posts are found
                                if (mysqli_num_rows($result_sport) > 0) :
                                    while ($post = mysqli_fetch_assoc($result_sport)) :
                                        // Prepare the post data
                                        $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                                        $formatted_date = date('F j, Y', strtotime($post['date']));
                                        $title = htmlspecialchars($post['dtitle']);
                                        $unique_id = htmlspecialchars($post['unique_id']);
                                ?>
                                        <div class="media news-media align-items-center">
                                            <a href="singlepost?unique_id=<?= $unique_id ?>">
                                                <img src="<?= $image_path ?>" alt="image">
                                            </a>
                                            <div class="content">
                                                <span><i class="icofont-calendar"></i> <?= $formatted_date ?></span>
                                                <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                            </div>
                                        </div>
                                    <?php
                                    endwhile;
                                else :
                                    ?>
                                    <div class="alert__message error container">No sports posts found</div>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="section-title">
                    <h2>Stay Connected</h2>
                </div>
                <ul class="stay-connected">
                    <li>
                        <a href="https://www.facebook.com/login/" target="_blank"><i class="icofont-facebook"></i><b>10.2K</b> <span>Fans</span></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/login/" target="_blank"><i class="icofont-twitter"></i><b>14.2K</b> <span>Followers</span></a>
                    </li>
                    <li>
                        <a href="https://linkedin.com/login/" target="_blank"><i class="icofont-linkedin"></i><b>11.2K</b> <span>Fans</span></a>
                    </li>
                    <li>
                        <a href="https://en.wikipedia.org/wiki/RSS" target="_blank"><i class="icofont-rss"></i><b>15.2K</b> <span>Subscriber</span></a>
                    </li>
                </ul>
                <div class="stay-connected-ads">
                    <a href="post-category-3.html"><img src="assets/img/3-ads.png" alt="image"></a>
                </div>
            </div>
        </div>
    </div>
</section>