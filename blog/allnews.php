<section class="all-news-area ptb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="fashion-news">
                    <div class="section-title">
                        <h2>Sports</h2>
                    </div>
                    <div class="single-fashion-news">
                        <?php
                        $query_active = "SELECT * FROM post WHERE category = 'sports' AND dstatus = 'active' ORDER BY RAND() LIMIT 1";
                        $active_posts = mysqli_query($conn, $query_active);
                        ?>
                        <style>
                            .fixed-size-image {
                                width: 600px;
                                height: 300px;
                                object-fit: cover;
                            }
                        </style>
                        <?php if (mysqli_num_rows($active_posts) > 0) : ?>
                            <?php while ($post = mysqli_fetch_assoc($active_posts)) :
                                $post_date = $post['date'];
                                $post_date_time = new DateTime($post_date);
                                $formatted_date = $post_date_time->format('F j, Y');
                                $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                            ?>
                                <img src="<?= $image_path ?>" alt="image" class="fixed-size-image">
                                <div class="news-content">
                                    <ul>
                                        <li><i class="icofont-user-suited"></i><a href="#"></a></li>
                                        <li><i class="icofont-calendar"></i><?= $formatted_date ?></li>
                                    </ul>
                                    <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                </div>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <div class="alert__message error container">No active posts found</div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="food-news">
                    <div class="section-title">
                        <h2>Politics</h2>
                    </div>
                    <div class="single-fashion-news">
                        <?php
                        $query_active = "SELECT * FROM post WHERE category = 'Politics' AND dstatus = 'active' ORDER BY RAND() LIMIT 1";
                        $active_posts = mysqli_query($conn, $query_active);
                        ?>
                        <style>
                            .fixed-size-image {
                                width: 600px;
                                height: 300px;
                                object-fit: cover;
                            }
                        </style>
                        <?php if (mysqli_num_rows($active_posts) > 0) : ?>
                            <?php while ($post = mysqli_fetch_assoc($active_posts)) :
                                $post_date = $post['date'];
                                $post_date_time = new DateTime($post_date);
                                $formatted_date = $post_date_time->format('F j, Y');
                                $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                            ?>
                                <img src="<?= $image_path ?>" alt="image" class="fixed-size-image">
                                <div class="news-content">
                                    <ul>
                                        <li><i class="icofont-user-suited"></i><a href="#"></a></li>
                                        <li><i class="icofont-calendar"></i><?= $formatted_date ?></li>
                                    </ul>
                                    <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                </div>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <div class="alert__message error container">No active posts found</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="north-america-news">
                    <div class="section-title">
                        <h2>Music</h2>
                    </div>
                    <div class="single-fashion-news">
                        <?php
                        $query_active = "SELECT * FROM post WHERE category = 'Music' AND dstatus = 'active' ORDER BY RAND() LIMIT 1";
                        $active_posts = mysqli_query($conn, $query_active);
                        ?>
                        <style>
                            .fixed-size-image {
                                width: 600px;
                                height: 300px;
                                object-fit: cover;
                            }
                        </style>
                        <?php if (mysqli_num_rows($active_posts) > 0) : ?>
                            <?php while ($post = mysqli_fetch_assoc($active_posts)) :
                                $post_date = $post['date'];
                                $post_date_time = new DateTime($post_date);
                                $formatted_date = $post_date_time->format('F j, Y');
                                $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                            ?>
                                <img src="<?= $image_path ?>" alt="image" class="fixed-size-image">
                                <div class="news-content">
                                    <ul>
                                        <li><i class="icofont-user-suited"></i><a href="#"></a></li>
                                        <li><i class="icofont-calendar"></i><?= $formatted_date ?></li>
                                    </ul>
                                    <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                </div>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <div class="alert__message error container">No active posts found</div>
                        <?php endif; ?>
                    </div>
                   
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4">
                <div class="fashion-news">
                    <div class="section-title">
                        <h2>Sports</h2>
                    </div>
                    <div class="single-fashion-news">
                        <?php
                        $query_active = "SELECT * FROM post WHERE category = 'sports' AND dstatus = 'active' ORDER BY RAND() LIMIT 1";
                        $active_posts = mysqli_query($conn, $query_active);
                        ?>
                        <style>
                            .fixed-size-image {
                                width: 600px;
                                height: 300px;
                                object-fit: cover;
                            }
                        </style>
                        <?php if (mysqli_num_rows($active_posts) > 0) : ?>
                            <?php while ($post = mysqli_fetch_assoc($active_posts)) :
                                $post_date = $post['date'];
                                $post_date_time = new DateTime($post_date);
                                $formatted_date = $post_date_time->format('F j, Y');
                                $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                            ?>
                                <img src="<?= $image_path ?>" alt="image" class="fixed-size-image">
                                <div class="news-content">
                                    <ul>
                                        <li><i class="icofont-user-suited"></i><a href="#"></a></li>
                                        <li><i class="icofont-calendar"></i><?= $formatted_date ?></li>
                                    </ul>
                                    <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                </div>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <div class="alert__message error container">No active posts found</div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4">
                <div class="food-news">
                    <div class="section-title">
                        <h2>Politics</h2>
                    </div>
                    <div class="single-fashion-news">
                        <?php
                        $query_active = "SELECT * FROM post WHERE category = 'Politics' AND dstatus = 'active' ORDER BY RAND() LIMIT 1";
                        $active_posts = mysqli_query($conn, $query_active);
                        ?>
                        <style>
                            .fixed-size-image {
                                width: 600px;
                                height: 300px;
                                object-fit: cover;
                            }
                        </style>
                        <?php if (mysqli_num_rows($active_posts) > 0) : ?>
                            <?php while ($post = mysqli_fetch_assoc($active_posts)) :
                                $post_date = $post['date'];
                                $post_date_time = new DateTime($post_date);
                                $formatted_date = $post_date_time->format('F j, Y');
                                $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                            ?>
                                <img src="<?= $image_path ?>" alt="image" class="fixed-size-image">
                                <div class="news-content">
                                    <ul>
                                        <li><i class="icofont-user-suited"></i><a href="#"></a></li>
                                        <li><i class="icofont-calendar"></i><?= $formatted_date ?></li>
                                    </ul>
                                    <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                </div>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <div class="alert__message error container">No active posts found</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4">
                <div class="food-news">
                    <div class="section-title">
                        <h2>Business</h2>
                    </div>
                    <div class="single-fashion-news">
                        <?php
                        $query_active = "SELECT * FROM post WHERE category = 'Business' AND dstatus = 'active' ORDER BY RAND() LIMIT 1";
                        $active_posts = mysqli_query($conn, $query_active);
                        ?>
                        <style>
                            .fixed-size-image {
                                width: 600px;
                                height: 300px;
                                object-fit: cover;
                            }
                        </style>
                        <?php if (mysqli_num_rows($active_posts) > 0) : ?>
                            <?php while ($post = mysqli_fetch_assoc($active_posts)) :
                                $post_date = $post['date'];
                                $post_date_time = new DateTime($post_date);
                                $formatted_date = $post_date_time->format('F j, Y');
                                $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                            ?>
                                <img src="<?= $image_path ?>" alt="image" class="fixed-size-image">
                                <div class="news-content">
                                    <ul>
                                        <li><i class="icofont-user-suited"></i><a href="#"></a></li>
                                        <li><i class="icofont-calendar"></i><?= $formatted_date ?></li>
                                    </ul>
                                    <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                </div>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <div class="alert__message error container">No active posts found</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="all-news-ads">
                    <a href="post-category-3.html"><img src="assets/img/5-ads.png" alt="image"></a>
                </div>
            </div>
        </div>
    </div>
</section>