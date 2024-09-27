<?php require './head.php' ?>

<?php
function truncateText($text, $maxLength = 20)
{
    if (strlen($text) > $maxLength) {
        return substr($text, 0, $maxLength) . '...';
    }
    return $text;
}
?>

<body>
    <?php require './sidebar.php' ?>

    <main class="dashboard-main">
        <?php require './header.php';
        require './successerror.php'; ?>

        <div class="dashboard-main-body">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
                <h6 class="fw-semibold mb-0">manage Active Post</h6>
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        <a href="dashboard" class="d-flex align-items-center gap-1 hover-text-primary">
                            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                </ul>
            </div>

            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-sm-flex d-block">
                            <div class="me-auto mb-sm-0 mb-3">
                                <h4 class="card-title mb-2">Active Post</h4>
                            </div>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#addContentModal" class="btn btn-success d-lg-block m-l-15">
                                <i class="fa fa-plus-circle"></i> Add New Post
                            </a>
                        </div>

                        <?php
                        // Fetch active posts
                        $query_active = "SELECT * FROM post WHERE dstatus = 'active'";
                        $active_posts = mysqli_query($conn, $query_active);
                        ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php if (mysqli_num_rows($active_posts) > 0) : ?>
                                    <table class="table table-hover style-1 bordered-table mb-0" id="dataTable" data-page-length='10'>
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Subcategory</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($post = mysqli_fetch_assoc($active_posts)) :
                                                $badgeClass = ($post['dstatus'] == 'active') ? 'bg-success' : 'bg-info'; ?>
                                                <tr>
                                                    <td><?= truncateText($post['dtitle']); ?></td> <!-- Truncated title -->
                                                    <td><?= $post['category']; ?></td>
                                                    <td><?= strip_tags($post['subcategory']); ?></td>
                                                    <td><span class="badge <?= $badgeClass ?>"><?= ucfirst($post['dstatus']) ?></span></td>
                                                    <td><?= $post['date']; ?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="details?unique_id=<?= $post['unique_id']; ?>">
                                                                <button type="button" class="btn btn-success m-l-17 mr-2 me-4 mb-4">Details</button>
                                                            </a>
                                                            <form action="updatea.php" method="post" class="buttons disable-form">
                                                                <input type="hidden" name="unique_id" value="<?= $post['unique_id']; ?>">
                                                                <button type="submit" class="btn btn-warning mr-2 disable-button me-4 mb-4">Disable</button>
                                                            </form>

                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                            </div>
                        <?php else : ?>
                            <div class="alert__message error container">No active posts found</div>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add New Content Modal -->
        <div class="modal fade" id="addContentModal" tabindex="-1" role="dialog" aria-labelledby="addContentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="postprocess" method="post" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addContentModalLabel">Add New Content</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="dtitle">Title</label>
                                <input type="text" class="form-control" id="dtitle" name="dtitle" required>
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

                            <div class="row">
                                <!-- Description Field -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="desc" class="form-label fw-semibold text-primary-light text-sm mb-8">Description</label>
                                        <textarea name="description" class="form-control radius-8 editor" id="desc" placeholder="Write description..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dimage">Cover Image</label>
                                <input type="file" class="form-control" id="dimage" name="dimage">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary">Save Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <?php require './footer.php' ?>
    </main>

    <?php require './scripts.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Disable button click
            $('.disable-button').click(function(e) {
                e.preventDefault();
                let form = $(this).closest('form');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This action will disable the post!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, disable it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Form already has the action and method set
                    }
                });
            });

            // Delete button click
            $('.delete-button').click(function(e) {
                e.preventDefault();
                let form = $(this).closest('form');
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
                        form.submit();
                    }
                });
            });
        });
    </script>
    /* <!-- Example CSS customization for SweetAlert --> */
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

    <!-- Bootstrap and jQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>