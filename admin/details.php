<?php
require './head.php';
require './sidebar.php';
?>

<body>
    <main class="dashboard-main">
        <?php require './header.php'; ?>

        <div class="dashboard-main-body">
            <?php
            if (isset($_GET['unique_id'])) {
                $unique_id = htmlspecialchars($_GET['unique_id']);

                // Fetch the post based on unique_id
                $query = "SELECT * FROM post WHERE unique_id = '$unique_id'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    $post = mysqli_fetch_assoc($result);
                } else {
                    echo "<div class='alert alert-danger'>Post not found.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>No post ID provided.</div>";
            }
            ?>

            <?php if (isset($post)) : ?>
                <div class="row">
                    <p><strong>Details Post</strong></p>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-end">
                                <button type="button" class="btn btn-primary me-4 mb-4" data-toggle="modal" data-target="#editPostModal">Edit</button>
                                <button type="button" class="btn btn-danger me-2 mb-2" id="deletePostButton">Delete</button>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="post-image mb-4">
                                            <?php if (!empty($post['dimage'])) : ?>
                                                <?php $img = "uploads/" . htmlspecialchars($post['dimage']); ?>
                                                <img src="<?= $img ?>" alt="Post Image" style="width: 400px; height: auto;">
                                            <?php else : ?>
                                                <p>No image available for this post.</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="post-details">
                                            <p><?= htmlspecialchars($post['dtitle']); ?></p>
                                            <hr>
                                            <p><?= htmlspecialchars($post['category']); ?></p>
                                            <hr>
                                            <p><?= strip_tags($post['subcategory']); ?></p>
                                            <hr>
                                            <p><?= htmlspecialchars($post['dstatus']); ?></p>
                                            <hr>
                                            <p><?= htmlspecialchars($post['date']); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <div class="post-description">
                                            <p><?= strip_tags($post['description']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                  <!-- Add New Content Modal -->
        <div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="addContentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="editprocess" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addContentModalLabel">Add New Content</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                            <div class="modal-body">
                                
                                <form name="editForm" action="editprocess" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="unique_id" value="<?= htmlspecialchars($unique_id); ?>">

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="dtitle">Title</label>
                                            <input type="text" class="form-control" id="dtitle" name="dtitle" value="<?= htmlspecialchars($post['dtitle']); ?>" required>
                                        </div>

                                        <div class="row">
                                            <!-- Category Field -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="category" class="form-label fw-semibold text-primary-light text-sm mb-8">Category <span class="text-danger">*</span></label>
                                                    <select name="category" class="form-control radius-8 form-select" id="category" required>
                                                        <?php
                                                        $query = "SELECT * FROM category";
                                                        $categories = mysqli_query($conn, $query);
                                                        while ($category = mysqli_fetch_assoc($categories)) : ?>
                                                            <option value="<?= $category['category']; ?>"><?= $category['category']; ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Subcategory Field -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="subcategory" class="form-label fw-semibold text-primary-light text-sm mb-8">Subcategory <span class="text-danger">*</span></label>
                                                    <select name="subcategory" class="form-control radius-8 form-select" id="subcategory" required>
                                                        <?php
                                                        $query = "SELECT * FROM subcategory";
                                                        $subcategories = mysqli_query($conn, $query);
                                                        while ($subcategory = mysqli_fetch_assoc($subcategories)) : ?>
                                                            <option value="<?= $subcategory['subcategory']; ?>"><?= $subcategory['subcategory']; ?></option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-12">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" class="form-control editor" rows="10"><?= strip_tags($post['description']); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="dimage">Cover Image</label>
                                            <input type="file" class="form-control" id="dimage" name="dimage">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Save Post</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SweetAlert2 Script for Delete Confirmation -->
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    document.getElementById('deletePostButton').addEventListener('click', function() {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'deletepost?unique_id=<?= htmlspecialchars($post['unique_id']); ?>';
                            }
                        });
                    });
                </script>
            <?php endif; ?>
        </div>

        <?php require './footer.php'; ?>
    </main>

    <!-- Bootstrap and jQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <?php require './scripts.php'; ?>

    <!-- CKEditor from CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>

    <script>
        const editors = document.querySelectorAll('.editor');
        editors.forEach(editorElement => {
            ClassicEditor
                .create(editorElement, {
                    toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'undo', 'redo'],
                })
                .then(editor => {
                    window.editor = editor;
                })
                .catch(err => {
                    console.error(err.stack);
                });
        });
    </script>
    <style>
        .swal2-popup {
            width: 300px !important;
            max-width: 100%;
            height: auto;
        }

        .swal2-title {
            font-size: 1.5rem !important;
        }

        .swal2-html-container {
            font-size: 1rem !important;
        }
    </style>

</body>

</html>