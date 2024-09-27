<section class="gallery-news-area ptb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="gallery-news">
                    <div class="section-title">
                        <h2>Gallery News</h2>
                    </div>
                    <div class="gallery-news-inner-slides owl-carousel owl-theme">
                        <div class="row align-items-center m-0">
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
                                    <div class="col-lg-6 col-md-6 p-0">
                                        <div class="gallery-news-content">
                                            <h3><i class="icofont-calendar"></i><?= $formatted_date ?></h3>
                                            <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 p-0">
                                        <div class="gallery-news-image"><img src="<?= $image_path ?>" alt="image"></div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <div class="alert__message error container">No active posts found</div>
                            <?php endif; ?>
                        </div>
                        <div class="row align-items-center m-0">
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
                                    <div class="col-lg-6 col-md-6 p-0">
                                        <div class="gallery-news-content">
                                            <h3><i class="icofont-calendar"></i><?= $formatted_date ?></h3>
                                            <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 p-0">
                                        <div class="gallery-news-image"><img src="<?= $image_path ?>" alt="image"></div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <div class="alert__message error container">No active posts found</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <?php
                $query_active = "SELECT * FROM post WHERE dstatus = 'active' ORDER BY RAND() LIMIT 2";
                $active_posts = mysqli_query($conn, $query_active);
                ?>

                <?php if (mysqli_num_rows($active_posts) > 0) : ?>
                    <?php while ($post = mysqli_fetch_assoc($active_posts)) :
                        $post_date = $post['date'];
                        $post_date_time = new DateTime($post_date);
                        $formatted_date = $post_date_time->format('F j, Y');
                        $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                    ?>
                    <style>
                        .fixed-image {
    width: 100px; /* Set the desired width */
    height: 80px; /* Set the desired height */
    object-fit: cover; /* Ensures the image fills the dimensions while maintaining its aspect ratio */
    display: block; /* Optional: Ensures it behaves like a block element */
}

                    </style>
                        <div class="gallery-news-list">
                            <div class="media gallery-news-media align-items-center">
                                <div class="image">
                                    <img src="<?= $image_path?>" alt="image" class="fixed-image"> <a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><i class="icofont-ui-camera "></i></a>
                                </div>
                                <div class="content">
                                    <h3>
                                        <a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><i class="icofont-camera-alt"></i> <?= $formatted_date ?></a>
                                    </h3>
                                </div>
                            </div>
                           
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <div class="alert__message error container">No active posts found</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>