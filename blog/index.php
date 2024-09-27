<?php require './head.php'
?>

<body>

    <?php require './header.php' ?>

    <section class="default-news-area ptb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">


                    <?php
                    $query_active = "SELECT * FROM post ORDER BY RAND() LIMIT 1";
                    $active_posts = mysqli_query($conn, $query_active);
                    ?>

                    <?php if (mysqli_num_rows($active_posts) > 0) : ?>
                        <?php while ($post = mysqli_fetch_assoc($active_posts)) :
                            $post_date = $post['date'];
                            $post_date_time = new DateTime($post_date);
                            $formatted_date = $post_date_time->format('F j, Y');
                            $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                        ?>
                            <div class="single-default-news">
                                <img src="<?php echo $image_path; ?>" alt="image" style="width: 100%; height: 400px; object-fit: cover;">
                                <div class="news-content">
                                    <ul>
                                        <li><i class="icofont-calendar"></i> <?php echo date('F j, Y', strtotime($post['date'])); ?></li>
                                    </ul>
                                    <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?php echo htmlspecialchars($post['dtitle']); ?></a></h3>
                                </div>
                                <div class="tags">
                                    <a href="postcategory?unique_id=<?php echo htmlspecialchars($post['id']); ?>"><?php echo htmlspecialchars($post['category']); ?></a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <div class="alert__message error container">No active posts found</div>
                    <?php endif; ?>
                    <!-- section for 2 imgae -->
                    <div class="row">
                        <?php
                        $query_active = "SELECT * FROM post ORDER BY RAND() LIMIT 2";
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
                                    .fixed-size-image {
                                        width: 300px;
                                        height: 200px;
                                        object-fit: cover;
                                    }
                                </style>
                                <div class="col-lg-6 col-md-6">
                                    <div class="single-default-inner-news">
                                        <div class="news-image"><img src="<?= $image_path ?>" alt="image" class="fixed-size-image"></div>
                                        <div class="news-content">
                                            <ul>
                                                <li><i class="icofont-calendar"></i> <?php echo date('F j, Y', strtotime($post['date'])); ?></li>
                                            </ul>
                                            <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                        </div>
                                        <div class="tags">
                                            <a href="postcategory?unique_id=<?php echo htmlspecialchars($post['id']); ?>"><?php echo htmlspecialchars($post['category']); ?></a>
                                        </div>
                                    </div>
                                </div>

                            <?php endwhile; ?>
                        <?php else : ?>
                            <div class="alert__message error container">No active posts found</div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="small-image-ads text-center">
                        <a href="singlepost"><img src="assets/img/1-ads.png" alt="image"></a>
                    </div>
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
                            <div class="single-default-inner-news">
                                <div class="news-image"><img src="<?= $image_path ?>" alt="image"></div>
                                <div class="news-content">
                                    <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                    <span><i class="icofont-calendar"></i> <?php echo date('F j, Y', strtotime($post['date'])); ?></span>
                                </div>
                                <!-- <a href="postcategory" class="link-overlay"></a> -->
                                <div class="tags">
                                    <a href="postcategory?unique_id=<?php echo htmlspecialchars($post['id']); ?>"><?php echo htmlspecialchars($post['category']); ?></a>
                                </div>
                            </div>


                        <?php endwhile; ?>
                    <?php else : ?>
                        <div class="alert__message error container">No active posts found</div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-3 col-md-6">
                    <style>
                        .link-overlay {
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            z-index: 10;
                        }

                        .single-default-inner-news {
                            position: relative;
                        }
                    </style>
                    <div class="default-video-news">
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
                                <div class="single-default-inner-news" style="position: relative;">
                                    <div class="news-image"><img src="<?= $image_path ?>" alt="image"></div>
                                    <div class="news-content">
                                        <h3><a href="singlepost?unique_id=<?php echo htmlspecialchars($post['unique_id']); ?>"><?= truncateText($post['dtitle']); ?></a></h3>
                                        <span><i class="icofont-calendar"></i> <?php echo $formatted_date; ?></span>
                                    </div>
                                    <!-- Overlay Link -->

                                    <div class="tags">
                                        <a href="postcategory?unique_id=<?php echo htmlspecialchars($post['id']); ?>"><?php echo htmlspecialchars($post['category']); ?></a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <div class="alert__message error container">No active posts found</div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <?php require './MostPopular.php' ?>

    <?php require './internationalnews.php' ?>

    <?php require './HealthLifestyle.php' ?>

    <?php require './GalleryNews.php' ?>

    <?php require './allnews.php' ?>

    <?php require './morenew.php' ?>

    <?php require './footer.php' ?>
    <?php require './scripts.php' ?>
</body>

</html>