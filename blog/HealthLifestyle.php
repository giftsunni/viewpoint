<section class="hot-news-area ptb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="health-lifestyle-news">
                            <div class="section-title">
                                <h2>Health & Lifestyle</h2>
                            </div>
                            <div class="health-lifestyle-news-slides owl-carousel owl-theme">
                                <?php
                                $query_active = "SELECT * FROM post WHERE dstatus = 'active' ORDER BY RAND()";
                                $active_posts = mysqli_query($conn, $query_active);
                                ?>

                                <?php if (mysqli_num_rows($active_posts) > 0) : ?>
                                    <?php while ($post = mysqli_fetch_assoc($active_posts)) :
                                        $post_date = $post['date'];
                                        $post_date_time = new DateTime($post_date);
                                        $formatted_date = $post_date_time->format('F j, Y');
                                        $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                                    ?>
                                        <div class="single-health-lifestyle-news">
                                            <div class="news-image">
                                                <a href="singlepost"><img src="<?= $image_path ?>" alt="image"></a>
                                            </div>
                                            <div class="news-content">
                                                <ul>
                                                    <li><i class="icofont-calendar"></i> <?= $formatted_date ?></li>
                                                    <li><i class="icofont-speech-comments"></i> <a href="single-post-1.html">50</a></li>
                                                </ul>
                                                <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php else : ?>
                                    <div class="alert__message error container">No active posts found</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="politics-news">
                            <div class="section-title">
                                <h2>Politics</h2>
                            </div>
                            <div class="politics-news-slides owl-carousel owl-theme">
                                <?php
                                $query_active = "SELECT * FROM post WHERE dstatus = 'active' ORDER BY RAND()";
                                $active_posts = mysqli_query($conn, $query_active);
                                ?>

                                <?php if (mysqli_num_rows($active_posts) > 0) : ?>
                                    <?php while ($post = mysqli_fetch_assoc($active_posts)) :
                                        $post_date = $post['date'];
                                        $post_date_time = new DateTime($post_date);
                                        $formatted_date = $post_date_time->format('F j, Y');
                                        $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                                    ?>
                                        <div class="single-politics-news">
                                            <div class="news-image">
                                                <a href="singlepost"><img src="<?= $image_path ?>" alt="image"></a>
                                            </div>
                                            <div class="news-content">
                                                <ul>
                                                    <li><i class="icofont-calendar"></i> <?= $formatted_date ?></li>
                                                    <li><i class="icofont-speech-comments"></i> <a href="single-post-1.html">50</a></li>
                                                </ul>
                                                <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php else : ?>
                                    <div class="alert__message error container">No active posts found</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="around-the-world-news pt-40">
                            <div class="section-title">
                                <h2>Around The World</h2>
                                <a href="single-post-1.html" class="view-more">View More <i class="icofont-rounded-double-right"></i></a>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-around-the-world-news">
                                        <?php
                                        $query_active = "SELECT * FROM post WHERE dstatus = 'active' ORDER BY RAND() LIMIT 1";
                                        $active_posts = mysqli_query($conn, $query_active);
                                        ?>

                                        <?php if (mysqli_num_rows($active_posts) > 0) : ?>
                                            <?php while ($post = mysqli_fetch_assoc($active_posts)) :
                                                $post_date = $post['date'];
                                                $post_date_time = new DateTime($post_date);
                                                $formatted_date = $post_date_time->format('F j, Y');
                                                $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                                            ?>
                                                <div class="news-image">
                                                    <a href="singlepost"><img src="<?= $image_path ?>" alt="image"></a>
                                                </div>
                                                <div class="news-content">
                                                    <ul>
                                                        <li><i class="icofont-calendar"></i> <?= $formatted_date ?></li>
                                                        <li><i class="icofont-speech-comments"></i> <a href="single-post-1.html">50</a></li>
                                                    </ul>
                                                    <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                            <div class="alert__message error container">No active posts found</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-around-the-world-news">
                                        <?php
                                        $query_active = "SELECT * FROM post WHERE category = 'Politics' AND dstatus = 'active' ORDER BY RAND() LIMIT 1";
                                        $active_posts = mysqli_query($conn, $query_active);
                                        ?>

                                        <?php if (mysqli_num_rows($active_posts) > 0) : ?>
                                            <?php while ($post = mysqli_fetch_assoc($active_posts)) :
                                                $post_date = $post['date'];
                                                $post_date_time = new DateTime($post_date);
                                                $formatted_date = $post_date_time->format('F j, Y');
                                                $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                                            ?>
                                                <div class="news-image">
                                                    <a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><img src="<?= $image_path ?>" alt="image"></a>
                                                </div>
                                                <div class="news-content">
                                                    <ul>
                                                        <li><i class="icofont-calendar"></i> <?= $formatted_date ?></li>
                                                        <li><i class="icofont-speech-comments"></i> <a href="single-post-1.html">50</a></li>
                                                    </ul>
                                                    <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                            <div class="alert__message error container">No active posts found</div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <?php
                                    $query_active = "SELECT * FROM post WHERE category = 'Music' AND dstatus = 'active' ORDER BY RAND() LIMIT 1";
                                    $active_posts = mysqli_query($conn, $query_active);
                                    ?>

                                    <?php if (mysqli_num_rows($active_posts) > 0) : ?>
                                        <?php while ($post = mysqli_fetch_assoc($active_posts)) :
                                            $post_date = $post['date'];
                                            $post_date_time = new DateTime($post_date);
                                            $formatted_date = $post_date_time->format('F j, Y');
                                            $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                                        ?>
                                            <div class="media around-the-world-news-media align-items-center">
                                                <a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><img src="<?= $image_path ?>" alt="image"> </a>
                                                <div class="content">
                                                    <span><i class="icofont-calendar"></i><?= $formatted_date ?></span>
                                                    <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                            <div class="alert__message error container">No active posts found</div>
                                        <?php endif; ?>
                                            </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <?php
                                    $query_active = "SELECT * FROM post WHERE category = 'Music' AND dstatus = 'active' ORDER BY RAND() LIMIT 1";
                                    $active_posts = mysqli_query($conn, $query_active);
                                    ?>

                                    <?php if (mysqli_num_rows($active_posts) > 0) : ?>
                                        <?php while ($post = mysqli_fetch_assoc($active_posts)) :
                                            $post_date = $post['date'];
                                            $post_date_time = new DateTime($post_date);
                                            $formatted_date = $post_date_time->format('F j, Y');
                                            $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                                        ?>
                                            <div class="media around-the-world-news-media align-items-center">
                                                <a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><img src="<?= $image_path ?>" alt="image"> </a>
                                                <div class="content">
                                                    <span><i class="icofont-calendar"></i><?= $formatted_date ?></span>
                                                    <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                            <div class="alert__message error container">No active posts found</div>
                                        <?php endif; ?>
                                            </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <?php
                                    $query_active = "SELECT * FROM post WHERE category = 'Politics' AND dstatus = 'active' ORDER BY RAND() LIMIT 1";
                                    $active_posts = mysqli_query($conn, $query_active);
                                    ?>

                                    <?php if (mysqli_num_rows($active_posts) > 0) : ?>
                                        <?php while ($post = mysqli_fetch_assoc($active_posts)) :
                                            $post_date = $post['date'];
                                            $post_date_time = new DateTime($post_date);
                                            $formatted_date = $post_date_time->format('F j, Y');
                                            $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                                        ?>
                                            <div class="media around-the-world-news-media align-items-center">
                                                <a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><img src="<?= $image_path ?>" alt="image"> </a>
                                                <div class="content">
                                                    <span><i class="icofont-calendar"></i><?= $formatted_date ?></span>
                                                    <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                            <div class="alert__message error container">No active posts found</div>
                                        <?php endif; ?>
                                            </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <?php
                                    $query_active = "SELECT * FROM post WHERE category = 'Sports' AND dstatus = 'active' ORDER BY RAND() LIMIT 1";
                                    $active_posts = mysqli_query($conn, $query_active);
                                    ?>

                                    <?php if (mysqli_num_rows($active_posts) > 0) : ?>
                                        <?php while ($post = mysqli_fetch_assoc($active_posts)) :
                                            $post_date = $post['date'];
                                            $post_date_time = new DateTime($post_date);
                                            $formatted_date = $post_date_time->format('F j, Y');
                                            $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                                        ?>
                                            <div class="media around-the-world-news-media align-items-center">
                                                <a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><img src="<?= $image_path ?>" alt="image"> </a>
                                                <div class="content">
                                                    <span><i class="icofont-calendar"></i><?= $formatted_date ?></span>
                                                    <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                            <div class="alert__message error container">No active posts found</div>
                                        <?php endif; ?>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="featured-news">
                    <div class="section-title">
                        <h2>Featured News</h2>
                    </div>

                    <?php
                    // Query to fetch 3 random featured active posts
                    $sql = "SELECT * FROM post WHERE dstatus = 'active' ORDER BY RAND() LIMIT 3";
                    $result = $conn->query($sql);

                    // Check if posts exist
                    if ($result->num_rows > 0) {
                        // Loop through each post
                        while ($post = $result->fetch_assoc()) {
                            $post_date = $post['date'];
                            $post_date_time = new DateTime($post_date);
                            $formatted_date = $post_date_time->format('F j, Y');
                            $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);

                            // Display the post details
                            echo '
            <div class="single-featured-news">
                <img src="' . $image_path . '" alt="image">
                <div class="news-content">
                    <ul>
                        <li><i class="icofont-calendar"></i> ' . $formatted_date . '</li>
                    </ul>
                    <h3><a href="post-category-' . $post['id'] . '">' . htmlspecialchars($post['dtitle']) . '</a></h3>
                </div>
                <div class="tags"><a href="post-category-' . $post['unique_id'] . '">' . htmlspecialchars($post['category']) . '</a></div>
            </div>';
                        }
                    } else {
                        echo '<p>No featured news available at the moment.</p>';
                    }
                    ?>
                </div>

                <div class="newsletter-box">
                    <div class="section-title">
                        <h2>Newsletter</h2>
                    </div>
                    <div class="newsletter-box-inner">
                        <h3>Subscribe To Our Mailing List To Get The New Updates!</h3>
                        <i class="icofont-email"></i>
                        <form class="newsletter-form" data-toggle="validator">
                            <input type="email" class="newsletter-input" placeholder="Enter your email" name="EMAIL" required="" autocomplete="off"> <button type="submit"><i class="icofont-paper-plane"></i></button>
                            <div id="validator-newsletter" class="form-result"></div>
                        </form>
                    </div>
                </div>
                <div class="hot-news-ads">
                    <a href="post-category-4.html"><img src="assets/img/4-ads.png" alt="image"></a>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="hot-news-ads2">
                    <a href="post-category-3.html"><img src="assets/img/5-ads.png" alt="image"></a>
                </div>
            </div>
        </div>
    </div>
</section>