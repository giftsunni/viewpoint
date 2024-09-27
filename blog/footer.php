<footer class="footer-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="single-footer-widget">
                    <h3>About The Magazine</h3>
                    <div class="contact-info">
                        <p>You can reach us via phone, email and website. Or send us some message through our Contact Page.</p>
                        <ul>
                            <li><i class="icofont-google-map"></i> 27 Division St, New York, NY 10002, USA</li>
                            <li><i class="icofont-phone"></i> <a href="tel:+818718257">+(234) 81718257</a></li>
                            <li><i class="icofont-envelope"></i> <a href="/cdn-cgi/l/email-protection#d3babdb5bc93a0babdbea6bdfdb0bcbe"><span class="__cf_email__" data-cfemail="7b12151d143b081215160e1555181416">[email&#160;protected]</span></a></li>
                        </ul>
                    </div>
                    <div class="connect-social">
                        <p>We're social, connect with us:</p>
                        <ul>
                            <li>
                                <a href="https://www.facebook.com/login/" target="_blank"><i class="icofont-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/login/" target="_blank"><i class="icofont-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://linkedin.com/login" target="_blank"><i class="icofont-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/accounts/login/" target="_blank"><i class="icofont-instagram"></i></a>
                            </li>
                            <li>
                                <a href="https://rss.com/login/" target="_blank"><i class="icofont-rss"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-footer-widget">
                    <h3>Latest News</h3>
                    <?php
                    // Fetch active posts randomly
                    $query_active = "SELECT * FROM post WHERE dstatus = 'active' ORDER BY RAND() LIMIT 3";
                    $active_posts = mysqli_query($conn, $query_active);

                    // Check if the query was successful
                    if ($active_posts === false) {
                        // Log or display the error (useful for debugging)
                        echo '<div class="alert__message error container">Error: ' . mysqli_error($conn) . '</div>';
                    } else {
                    ?>
                       <style>
                            .fixed-size-images {
                                width: 100px;
                                height: 100px;
                                object-fit: cover;
                            }
                        </style>
                        <div class="footer-latest-news-list">
                            <?php if (mysqli_num_rows($active_posts) > 0) : ?>
                                <?php while ($post = mysqli_fetch_assoc($active_posts)) :
                                    $post_date = $post['date'];
                                    $post_date_time = new DateTime($post_date);
                                    $formatted_date = $post_date_time->format('F j, Y');
                                    $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                                ?>
                                    <div class="media latest-news-media align-items-center">
                                        <a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>">
                                            <img src="<?= htmlspecialchars($image_path) ?>" alt="<?php echo htmlspecialchars($post['dtitle']); ?>" class="fixed-size-images">
                                        </a>
                                        <div class="content">
                                            <ul>
                                                <li><i class="icofont-calendar"></i> <?= $formatted_date ?></li>
                                                <li><a href="single-post.php"><i class="icofont-comment"></i>50</a></li>
                                            </ul>
                                            <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= htmlspecialchars(truncateText($post['dtitle'])); ?></a></h3>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <div class="alert__message error container">No active posts found</div>
                            <?php endif; ?>
                        </div>
                    <?php
                    } // Close the else block for successful query
                    ?>
                </div>


            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-footer-widget">
                    <h3>Twitter Feed</h3>
                    <div class="twitter-tweet-list">
                        <div class="single-tweet">
                            <i class="icofont-twitter"></i> <span>About 2 days ago</span>
                            <p>Conference Event WordPress Theme -> 2 New Home Added <a href="https://twitter.com/login">https://tt.co/Rn00zM5q7gY70</a></p>
                        </div>
                        <div class="single-tweet">
                            <i class="icofont-twitter"></i> <span>About 2 days ago</span>
                            <p>Conference Event WordPress Theme -> 2 New Home Added <a href="https://twitter.com/login">https://tt.co/Rn00zM5q7gY70</a></p>
                        </div>
                        <div class="single-tweet">
                            <i class="icofont-twitter"></i> <span>About 2 days ago</span>
                            <p>Conference Event WordPress Theme -> 2 New Home Added <a href="https://twitter.com/login">https://tt.co/Rn00zM5q7gY70</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <p>© Sinmun is Proudly Owned by <a href="https://envytheme.com/" target="_blank">EnvyTheme</a></p>
                </div>
                <div class="col-lg-6 col-md-12">
                    <ul class="footer-nav">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="single-post-1.html">Blog</a></li>
                        <li><a href="post-category-1.html">Forums</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="post-category-1.html">Advertisement</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>