<!-- Start More News Area -->
<section class="more-news-area">
    <div class="container">
        <div class="more-news-inner">
            <div class="section-title">
                <h2>More News</h2>
            </div>
            <div class="row">
                <div class="more-news-slides owl-carousel owl-theme">
                    <?php
                    // Fetch all active posts except those in the Business category
                    $sql_more_news = "SELECT * FROM post WHERE dstatus = 'active' AND category != 'Business' ORDER BY RAND()";
                    $result_more_news = $conn->query($sql_more_news);
                    if ($result_more_news->num_rows > 0) {
                        while ($post = $result_more_news->fetch_assoc()) {
                            $post_date = $post['date'];
                            $post_date_time = new DateTime($post_date);
                            $current_date_time = new DateTime();
                            $interval = $current_date_time->diff($post_date_time);

                            // Calculate the time difference
                            if ($interval->days > 0) {
                                $time_diff = $interval->days . ' days ago';
                            } else {
                                $time_diff = $interval->h . ' hours ' . $interval->i . ' minutes ago';
                            }

                            $formatted_date = $post_date_time->format('F j, Y');
                            $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                            ?>

                            <div class="col-lg-12 col-md-12">
                                <div class="single-more-news">
                                    <img src="<?php echo $image_path; ?>" alt="image" class="fixed-size-image">

                                    <div class="news-content">
                                        <ul>
                                            <li><i class="icofont-user-suited"></i></li>
                                            <li><i class="icofont-calendar"></i> <?php echo $formatted_date; ?></li>
                                        </ul>
                                        <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                    </div>

                                    <div class="tags bg-<?php echo rand(1, 5); ?>">
                                        <a href="postcategory?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?php echo htmlspecialchars($post['category']); ?></a>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                    } else {
                        echo "<p>No more news found</p>";
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End More News Area -->
