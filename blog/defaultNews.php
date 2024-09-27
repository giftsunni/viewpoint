<section class="default-news-area bg-color-none mt-8">
    <div class="container">
        <div class="row">
            <div class="default-news-slides owl-carousel owl-theme">
                <?php
                // Query to select posts where the category is 'sports' and the post is active
                $query_sport = "SELECT * FROM post WHERE category = 'sports' AND dstatus = 'active' ORDER BY RAND()";
                $sport_posts = mysqli_query($conn, $query_sport);

                // Check if there are any posts
                if (mysqli_num_rows($sport_posts) > 0) {
                    // Loop through each post and display it
                    while ($post = mysqli_fetch_assoc($sport_posts)) {
                        $post_date = $post['date'];
                        $formatted_date = date('F j, Y', strtotime($post_date));
                        $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                        ?>
                        <div class="col-lg-12 col-md-12">
                            <div class="single-default-news">
                                <img src="<?= $image_path ?>" alt="image">
                                <div class="news-content">
                                    <ul>
                                        <li><i class="icofont-user-suited"></i></li>
                                        <li><i class="icofont-calendar"></i> <?= $formatted_date; ?></li>
                                    </ul>
                                    <h3><a href="singlepost?unique_id=<?= htmlspecialchars($post['unique_id']); ?>"><?= htmlspecialchars($post['dtitle']); ?></a></h3>
                                </div>
                                <div class="tags">
                                    <a href="postcategory?unique_id=<?= htmlspecialchars($post['id']); ?>">Sports</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No active sports posts available.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</section>


