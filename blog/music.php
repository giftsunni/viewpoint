<?php require './head.php';

// Fetch posts from the Politics category
$sql = "SELECT * FROM post WHERE category = 'Music' AND dstatus = 'active' ORDER BY RAND()";
$result = $conn->query($sql);

// Check if there are any posts
if ($result->num_rows == 0) {
  echo "No posts found";
}
?>

<body>

  <!-- Start Header Area -->
  <?php require './header.php' ?>
  <!-- End Header Area -->

  <!-- Start Page Title Area -->
  <div class="page-title-area">
    <div class="container">
      <div class="page-title-content">
        <h2>Music</h2>

        <ul>
          <li><a href="index.html"><i class="icofont-home"></i> Home</a></li>
          <li><i class="icofont-rounded-right"></i></li>
          <li>Music</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Page Title Area -->

  <!-- Start Default News Area -->
  <section class="default-news-area bg-color-none">
    <div class="container">
      <div class="row">
        <div class="default-news-slides owl-carousel owl-theme">
          <?php
          if ($result->num_rows > 0) {
            while ($post = $result->fetch_assoc()) {
              $post_date = $post['date'];
              $post_date_time = new DateTime($post_date);
              $formatted_date = $post_date_time->format('F j, Y');
              $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
          ?>
              <div class="col-lg-12 col-md-12">
                <div class="single-default-news">
                  <img src="<?php echo $image_path; ?>" alt="image">

                  <div class="news-content">
                    <ul>
                      <li><i class="icofont-calendar"></i><?= $formatted_date; ?></li>
                    </ul>
                    <h3><a href="singlepost?unique_id=<?= $post['unique_id']; ?>"><?= $post['dtitle']; ?></a></h3>
                  </div>

                  <div class="tags">
                    <a href="postcategory"><?php echo htmlspecialchars($post['category']); ?></a>
                  </div>
                </div>
              </div>
          <?php
            }
          } else {
            echo "<p>No posts found</p>";
          }
          ?>
        </div>
      </div>
    </div>
  </section>
    <!-- <?php require './defaultNews.php' ?> -->
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
