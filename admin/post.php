<?php require './head.php';

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
                <h6 class="fw-semibold mb-0">Manage Post/Pending Post</h6>
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
                                <h4 class="card-title mb-2">Post/Pending Post</h4>
                            </div>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#addContentModal" class="btn btn-success d-lg-block m-l-15">
                                <i class="fa fa-plus-circle"></i> Add New Post
                            </a>
                        </div>

                        <?php
                        $query = "SELECT * FROM post WHERE dstatus = 'pending' OR dstatus = 'disabled'";
                        $posts = mysqli_query($conn, $query);
                        ?>

                        <div class="card-body">
                            <div class="table-responsive">
                                <?php if (mysqli_num_rows($posts) > 0) : ?>
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
                                            <?php while ($post = mysqli_fetch_assoc($posts)) :
                                                // Set badge class based on status
                                                $badgeClass = ($post['dstatus'] == 'active') ? 'bg-success' : 'bg-info'; ?>
                                                <tr>
                                                    <td><?= truncateText($post['dtitle']); ?></td> <!-- Truncated title -->
                                                    <td><?= htmlspecialchars($post['category']); ?></td>
                                                    <td><?= htmlspecialchars($post['subcategory']); ?></td>
                                                    <td><span class="badge <?= $badgeClass ?>"><?= ucfirst($post['dstatus']) ?></span></td>
                                                    <td><?= htmlspecialchars($post['date']); ?></td>
                                                    <td>
                                                        <?php if ($post['dstatus'] === 'active') : ?>
                                                            <a href="details?unique_id=<?= htmlspecialchars($post['unique_id']); ?>">
                                                                <button type="button" class="btn btn-primary">Views</button>
                                                            </a>
                                                            <span class="btn btn-success">Activated</span>
                                                        <?php else : ?>
                                                            <a href="details?unique_id=<?= htmlspecialchars($post['unique_id']); ?>">
                                                                <button type="button" class="btn btn-primary">Details</button>
                                                            </a>
                                                            <form action="text" method="post" class="d-inline" id="activateForm-<?= htmlspecialchars($post['unique_id']); ?>">
                                                                <input type="hidden" name="unique_id" value="<?= htmlspecialchars($post['unique_id']); ?>">
                                                                <input type="hidden" name="action" value="activate">
                                                                <button type="button" class="btn btn-success activate-button" data-id="<?= htmlspecialchars($post['unique_id']); ?>">Activate</button>
                                                            </form>


                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                <?php else : ?>
                                    <div class="alert alert-danger text-center">No posts found</div>
                                <?php endif; ?>
                            </div>
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

    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- SweetAlert Script -->
    <script>
        $(document).ready(function() {
            // SweetAlert for activating post
            $('.activate-button').click(function(e) {
                e.preventDefault();
                let form = $(this).closest('form');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You want to activate this post?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, activate it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('<input>').attr({
                            type: 'hidden',
                            name: 'action',
                            value: 'activate'
                        }).appendTo(form);
                        form.method = 'post';
                        form.action = 'updatea'; // Correct script path
                        form.submit();
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const alertMessage = document.getElementById('alertMessage');
            if (alertMessage) {
                setTimeout(() => {
                    alertMessage.style.display = 'none';
                }, 5000); // Hide after 5 seconds
            }
        });
    </script>

    <!-- Bootstrap and jQuery Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>