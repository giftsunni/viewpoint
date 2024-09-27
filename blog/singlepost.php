<?php require './head.php';
require_once './closefile.php' ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<body>

    <!-- Start Header Area -->
    <?php require './header.php' ?>
    <!-- End Header Area -->
    <style>
        .post-interactions {
            margin-top: 20px;
        }

        .post-interactions button {
            border: none;
            background: none;
            color: #007bff;
            cursor: pointer;
            font-size: 16px;
            margin-right: 15px;
        }

        .post-interactions i {
            margin-right: 5px;
        }
    </style>

    <!-- Start News Details Area -->
    <section class="news-details-area pb-40">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="ind"><i class="icofont-home"></i> Home</a></li>
                <li><i class="icofont-rounded-right"></i></li>
                <li><a href="post-category">Technology</a></li>
                <li><i class="icofont-rounded-right"></i></li>
                <li>Style</li>
            </ul>
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="news-details">
                        <?php
                        // Get the unique_id from the URL
                        if (isset($_GET['unique_id'])) {
                            $unique_id = $_GET['unique_id'];

                            // Fetch the post details, including likes and dislikes
                            $query = "SELECT dtitle, dimage, date, likes, dislikes FROM post WHERE unique_id = '$unique_id'";
                            $result = mysqli_query($conn, $query);

                            // Check if the post exists
                            if (mysqli_num_rows($result) > 0) {
                                $post = mysqli_fetch_assoc($result);
                            } else {
                                echo "<div class='alert__message error container'>Post not found!</div>";
                                exit();
                            }

                            // Fetch the total number of comments for this post
                            $commentQuery = "SELECT COUNT(*) AS total_comments FROM comments WHERE unique_id = '$unique_id'";
                            $commentResult = mysqli_query($conn, $commentQuery);
                            $commentData = mysqli_fetch_assoc($commentResult);
                            $total_comments = $commentData['total_comments'];

                            // Get likes and dislikes directly from the post data
                            $total_likes = $post['likes'] ?? 0;
                            $total_dislikes = $post['dislikes'] ?? 0;
                        } else {
                            echo "<div class='alert__message error container'>No post selected!</div>";
                            exit();
                        }
                        ?>

                        <?php if ($post): ?>
                            <?php
                            $post_date = $post['date'];
                            $post_date_time = new DateTime($post_date);
                            $formatted_date = $post_date_time->format('F j, Y');
                            $image_path = '../admin/uploads/' . htmlspecialchars($post['dimage']);
                            ?>
                            <style>
                                .fixed-size-image {
                                    width: 300px;
                                    height: 400px;
                                    object-fit: cover;
                                }
                            </style>
                            <div class="article-img">
                                <img src="<?= $image_path ?>" alt="image" class="fixed-size-image">
                            </div>

                            <div class="article-content">
                                <ul class="entry-meta">
                                    <!-- <li><i class="icofont-user"></i> <a href="singlepost">Sinmun</a></li> -->
                                    <li><i class="icofont-comment"></i> <?= $total_comments ?> Comments</li>
                                    <li><i class="icofont-calendar"></i> <?= $formatted_date ?></li>
                                    <!-- Like and Dislike buttons -->
                                    <li class="post-interactions">
                                        <button id="likeBtn" onclick="updateLikeDislikees('like', '<?= $unique_id ?>')">👍 Like
                                            <span id="likeCount"><?= $total_likes ?></span>
                                        </button>
                                        <button id="dislikeBtn" onclick="updateLikeDislikees('dislike', '<?= $unique_id ?>')">👎 Dislike
                                            <span id="dislikeCount"><?= $total_dislikes ?></span>
                                        </button>
                                    </li>
                                    <li>
                                        <strong>Share</strong>
                                        <!-- AddToAny BEGIN -->
                                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style mb-20">
                                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                            <a class="a2a_button_facebook"></a>
                                            <a class="a2a_button_sms"></a>
                                            <a class="a2a_button_telegram"></a>
                                            <a class="a2a_button_linkedin"></a>
                                            <a class="a2a_button_whatsapp"></a>
                                            <a class="a2a_button_x"></a>
                                        </div>
                                        <script type="text/javascript" src="//static.addtoany.com/menu/page.js"></script>
                                        <!-- AddToAny END -->
                                    </li>


                                    <script>
                                        function updateLikeDislikees(action, unique_id) {
                                            // Send AJAX request to the PHP backend
                                            var xhr = new XMLHttpRequest();
                                            xhr.open("POST", "update", true); // Change this to the correct PHP file path
                                            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                                            // Handle the response
                                            xhr.onreadystatechange = function() {
                                                if (xhr.readyState === XMLHttpRequest.DONE) {
                                                    if (xhr.status === 200) {
                                                        var response = JSON.parse(xhr.responseText);
                                                        if (response.success) {
                                                            document.getElementById('likeCount').textContent = response.likes;
                                                            document.getElementById('dislikeCount').textContent = response.dislikes;
                                                        } else {
                                                            alert(response.message || 'Action failed.');
                                                        }
                                                    } else {
                                                        alert('An error occurred. Please try again.');
                                                    }
                                                }
                                            };

                                            // Send the data
                                            xhr.send("action=" + action + "&unique_id=" + unique_id);
                                        }
                                    </script>
                                </ul>
                                <h3><?= $post['dtitle'] ?></h3>
                            <?php else: ?>
                                <div class="alert__message error container">No active posts found</div>
                            <?php endif; ?>

                            </div>
                    </div>


                    <div class="post-controls-buttons">
                        <div>
                            <a href="singlepost">Prev Post</a>
                        </div>

                        <div>
                            <a href="singlepost">Next Post</a>
                        </div>
                    </div>

                    <div class="comments-area">
                        <h3 class="comments-title">2 Comments:</h3>
                        <?php
                       // Function to fetch all comments for a specific post
function getAllComments($unique_id)
{
    global $conn;

    // Query to fetch all comments for a post, ordered by parent_id and created_at
    $query = "SELECT * FROM comments WHERE unique_id = '$unique_id' ORDER BY parent_id ASC, created_at DESC";
    $result = $conn->query($query);

    // Organize comments by parent_id into an associative array
    $comments = [];
    while ($row = $result->fetch_assoc()) {
        $comments[$row['parent_id']][] = $row;
    }

    return $comments;
}

function displayComments($comments, $parent_id = 0) {
    if (isset($comments[$parent_id])) { ?>
        <ul class="comment-list">
            <?php foreach ($comments[$parent_id] as $comment): 
                // Add 'reply' class if the comment is a reply
                $is_reply = ($parent_id != 0) ? ' reply' : ''; 
                ?>
                <li class="comment<?= $is_reply ?>">
                    <article class="comment-body">
                        <footer class="comment-meta">
                            <div class="comment-author vcard">
                                <span class="author-name"><?= htmlspecialchars($comment['author']) ?></span>
                            </div>
                            <div class="comment-metadata">
                                <time><?= date('F j, Y, g:i a', strtotime($comment['created_at'])) ?></time>
                            </div>
                        </footer>

                        <div class="comment-content">
                            <p><?= htmlspecialchars($comment['content']) ?></p>
                        </div>

                        <!-- Like/Dislike buttons -->
                        <button id="likeBtn-<?= $comment['id'] ?>" onclick="updateLikeDislike(<?= $comment['id'] ?>, 'like')">
                            👍 Like <span id="likeCount-<?= $comment['id'] ?>"><?= $comment['total_likes'] ?></span>
                        </button>
                        <button id="dislikeBtn-<?= $comment['id'] ?>" onclick="updateLikeDislike(<?= $comment['id'] ?>, 'dislike')">
                            👎 Dislike <span id="dislikeCount-<?= $comment['id'] ?>"><?= $comment['total_dislikes'] ?></span>
                        </button>

                        <!-- Reply link -->
                        <div class="reply">
                            <a href="#comment-form" class="comment-reply-link" data-parent="<?= $comment['id'] ?>">Reply</a>
                        </div>
                    </article>

                    <!-- Recursively display child comments (replies) -->
                    <?php displayComments($comments, $comment['id']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php }
}



                        //

                        // LIKES FOR THE REPLIED SECTION

                        // Assuming you have a $unique_id variable from the URL
                        $unique_id = $_GET['unique_id'];  // You can get this from the URL

                        // Query to get the unique_id from the unique_id
                        $postQuery = "SELECT unique_id FROM post WHERE unique_id = '$unique_id'";
                        $postResult = $conn->query($postQuery);

                        // Ensure a post with the given unique_id exists
                        if ($postResult->num_rows > 0) {
                            $postRow = $postResult->fetch_assoc();
                            $unique_id = $postRow['unique_id']; // Get the unique_id

                            // Fetch and display all comments for the correct post
                            $comments = getAllComments($unique_id);
                            displayComments($comments);
                        } else {
                            // Handle case where no post matches the unique_id
                            echo "No comments found for this post.";
                        }
                        ?>
                        <div class="comment-respond">
                            <h3 class="comment-reply-title">Leave a Reply</h3>

                            <form action="submitcomment" method="POST" class="comment-form" id="comment-form">
                                <p class="comment-notes">
                                    <span id="email-notes">Your email address will not be published.</span>
                                    Required fields are marked <span class="required">*</span>
                                </p>

                                <p class="comment-form-comment">
                                    <label for="comment">Comment</label>
                                    <textarea name="comment" id="comment" cols="45" rows="5" maxlength="65525"></textarea>
                                </p>

                                <p class="comment-form-author">
                                    <label for="name">Name <span class="required">*</span></label>
                                    <input type="text" id="author" name="author">
                                    <input type="hidden" name="unique_id" value="<?php echo $unique_id; ?>">
                                    <!-- Hidden Fields -->
                                    <input type="hidden" name="unique_id" value="<?php echo $unique_id; ?>"> <!-- Post ID -->
                                    <input type="hidden" name="parent_id" id="parent_id" value="0"> <!-- Default to 0 for top-level comments -->
                                </p>

                                <p class="comment-form-email">
                                    <label for="email">Email <span class="required">*</span></label>
                                    <input type="email" id="email" name="email">
                                </p>


                                <p class="comment-form-cookies-consent">
                                    <input type="checkbox" value="yes" name="wp-comment-cookies-consent" id="wp-comment-cookies-consent">
                                    <label for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label>
                                </p>

                                <p class="form-submit">
                                    <input type="submit" name="submit" id="submit" class="submit" value="Post Comment" disabled>
                                </p>
                            </form>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const commentForm = document.getElementById('comment-form');
                                    const submitButton = document.getElementById('submit');
                                    const authorInput = document.getElementById('author');
                                    const emailInput = document.getElementById('email');
                                    const commentInput = document.getElementById('comment');

                                    // Function to enable/disable submit button based on field values
                                    function toggleSubmitButton() {
                                        if (authorInput.value && emailInput.value && commentInput.value) {
                                            submitButton.disabled = false;
                                        } else {
                                            submitButton.disabled = true;
                                        }
                                    }

                                    document.addEventListener('click', function(e) {
                                        if (e.target.classList.contains('comment-reply-link')) {
                                            e.preventDefault();

                                            // Get the parent ID from the data attribute in the reply link
                                            const parentId = e.target.getAttribute('data-parent');

                                            // Move the comment form below the comment you're replying to
                                            const commentToReply = e.target.closest('.comment');
                                            commentToReply.appendChild(commentForm); // Append form under the specific comment

                                            // Update the parent_id input field with the comment ID being replied to
                                            document.getElementById('parent_id').value = parentId;

                                            // Scroll smoothly to the form after moving it
                                            commentForm.scrollIntoView({
                                                behavior: 'smooth'
                                            });
                                        }
                                    });
                                    // Attach event listeners to input fields to check if they're filled
                                    authorInput.addEventListener('input', toggleSubmitButton);
                                    emailInput.addEventListener('input', toggleSubmitButton);
                                    commentInput.addEventListener('input', toggleSubmitButton);
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area" id="secondary">
                        <section class="widget widget_search">
                            <form class="search-form">
                                <label>
                                    <span class="screen-reader-text">Search for:</span>
                                    <input type="search" class="search-field" placeholder="Search here...">
                                </label>
                                <input type="submit" class="search-submit" value="Search">
                            </form>
                        </section>



                        <section class="widget widget_recent_comments">
                            <h3 class="widget-title">Recent Comments</h3>

                            <ul>
                                <?php
                                // Fetch the 5 most recent comments
                                $query = "SELECT * FROM comments ORDER BY created_at DESC LIMIT 5";
                                $result = mysqli_query($conn, $query);

                                if ($result) {
                                    while ($comment = mysqli_fetch_assoc($result)) {
                                        // Fetch the post title based on the unique_id
                                        $postQuery = "SELECT dtitle FROM post WHERE unique_id = '{$comment['unique_id']}'";
                                        $postResult = mysqli_query($conn, $postQuery);
                                        $post = mysqli_fetch_assoc($postResult);

                                        // Output the comment and post details
                                        echo '<li>';
                                        echo '<span class="comment-author-link">';
                                        echo '<a href="singlepost?unique_id=' . htmlspecialchars($comment['unique_id']) . '">' . htmlspecialchars($comment['author']) . '</a>';
                                        echo '</span>';
                                        echo ' on ';
                                        echo '<a href="singlepost?unique_id=' . htmlspecialchars($comment['unique_id']) . '">' . htmlspecialchars($post['dtitle']) . '</a>';
                                        echo '</li>';
                                    }
                                } else {
                                    echo '<li>No recent comments available.</li>';
                                }
                                ?>
                            </ul>
                        </section>


                        <section class="widget widget_archive">
                            <h3 class="widget-title">Archives</h3>

                            <ul>
                                <li><a href="gallery">May 2024</a></li>
                                <li><a href="gallery">April 2024</a></li>
                                <li><a href="gallery">June 2024</a></li>
                            </ul>
                        </section>

                        <section class="widget widget_categories">
                            <h3 class="widget-title">Categories</h3>

                            <ul>
                                <li><a href="postcategory">Business</a></li>
                                <li><a href="postcategory">Politics</a></li>
                                <li><a href="postcategory">Technology</a></li>
                                <li><a href="postcategory">Music</a></li>
                                <li><a href="postcategory">Sports</a></li>
                            </ul>
                        </section>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- End News Details Area -->

    <!-- Start More News Area -->


    <?php require './morenew.php' ?>
    <!-- End More News Area -->

    <!-- Start Footer Area -->
    <?php require './footer.php' ?>
    <!-- End Footer Area -->
    <script>
        document.querySelectorAll('.comment-reply-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                document.getElementById('parent_id').value = this.getAttribute('data-parent');
                document.getElementById('comment-form').scrollIntoView();
            });
        });
    </script>
    <!-- message -->
    <?php
    if (isset($_SESSION['message']) && isset($_SESSION['message_type'])) {
        $message = $_SESSION['message'];
        $message_type = $_SESSION['message_type'];

        // Clear the session message after displaying it
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }
    ?>

    <script>
        // Include this script after the toastr JS is loaded
        document.addEventListener("DOMContentLoaded", function() {
            <?php if (isset($message)) : ?>
                var messageType = "<?php echo $message_type; ?>"; // success or error
                var message = "<?php echo $message; ?>";

                if (messageType === "success") {
                    toastr.success(message);
                } else if (messageType === "error") {
                    toastr.error(message);
                }
            <?php endif; ?>
        });

        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    </script>
    // section for the comment side
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updateLikeDislike(commentId, actionn) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "likeDISLIKE", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);

                    // Update like and dislike counts in the DOM
                    if (response.success) {
                        document.getElementById('likeCount-' + commentId).textContent = response.likes;
                        document.getElementById('dislikeCount-' + commentId).textContent = response.dislikes;
                    }
                }
            };

            xhr.send("comment_id=" + commentId + "&actionn=" + actionn);
        }
    </script>
    <style>
   .comment-list {
    list-style: none;
    padding-left: 0;
}

.comment {
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
}

.comment-body {
    margin-bottom: 10px;
}

.comment-author {
    font-weight: bold;
}

.comment-content {
    margin-bottom: 10px;
}

.reply {
    margin-top: 10px;
}

.replies {
    margin-left: 40px; /* Indent replies */
    padding-left: 0;
}

.comment-reply-link {
    color: #007bff;
    cursor: pointer;
    text-decoration: none;
}

.comment-reply-link:hover {
    text-decoration: underline;
}



    </style>
<script>
// Function to toggle replies visibility
function toggleReplies(commentId) {
    var replies = document.getElementById('replies-' + commentId);

    if (replies.classList.contains('show')) {
        replies.classList.remove('show'); // Hide replies
    } else {
        replies.classList.add('show'); // Show replies
    }
}

</script>



    <?php require './scripts.php' ?>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    // SECTION FOR THE LIKES AND DISLIKES REPLIED//
</body>

</html>