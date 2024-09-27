<?php require './head.php' ?>
<body>
    <?php require './sidebar.php' ?>

    <main class="dashboard-main">
        <?php require './header.php';
        require './successerror.php' ?>

        <div class="dashboard-main-body">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
                <h6 class="fw-semibold mb-0">Category</h6>
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
                                <h4 class="card-title mb-2">Category</h4>
                            </div>
                            <!-- Add Category Button -->
                            <a href="javascript:void(0);" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#manageCategoryModal" onclick="showAddModal()">+ Add Category</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover style-1  bordered-table mb-0" id="dataTable" data-page-length='10'>
                                    <thead>
                                        <tr>
                                            <th>CATEGORY</th>
                                            <th>DATE</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $query = "SELECT * FROM category";
                                        $result = $conn->query($query);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                        ?>
                                                <tr>
                                                    <td><?= $row['category']; ?></td>
                                                    <td><?= $row['date']; ?></td>
                                                    <td>
                                                        <div class="d-flex action-button">
                                                            <button type="button" class="btn btn-warning-600 radius-8 px-20 py-11 me-4 mb-4" data-bs-toggle="modal" data-bs-target="#manageCategoryModal" onclick="showEditModal('<?= $row['id']; ?>', '<?= $row['category']; ?>', '<?= $row['date']; ?>')">Edit</button>
                                                            <button type="button" class="btn btn-danger-600 radius-8 px-20 py-11 me-4 mb-4" onclick="showDeleteModal('<?= $row['id']; ?>')">Delete</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='3'>No categories found.</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Manage Category Modal -->
                    <div class="modal fade" id="manageCategoryModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="categoryModalTitle">Edit Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="manageCategoryForm" method="post">
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Category Name</label>
                                            <input type="text" class="form-control" id="category" name="category" required>
                                        </div>
                                        <input type="hidden" id="categoryId" name="categoryId">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" id="categoryModalActionButton">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        function showAddModal() {
                            document.getElementById('categoryModalTitle').innerText = 'Add Category';
                            document.getElementById('categoryModalActionButton').innerText = 'Add Category';
                            document.getElementById('manageCategoryForm').action = 'categoryprocess';
                            clearModalFields();
                        }

                        function showEditModal(id, category, date) {
                            document.getElementById('categoryModalTitle').innerText = 'Edit Category';
                            document.getElementById('categoryModalActionButton').innerText = 'Save Changes';
                            document.getElementById('manageCategoryForm').action = 'editcategory';
                            document.getElementById('categoryId').value = id;
                            document.getElementById('category').value = category;
                        }

                        function clearModalFields() {
                            document.getElementById('categoryId').value = '';
                            document.getElementById('category').value = '';
                        }

                        function showDeleteModal(id) {
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
                                    window.location.href = 'deletecategory?id=' + id;
                                }
                            })
                        }
                    </script>

                </div>
            </div>
        </div>
        <?php require './footer.php' ?>
    </main>

    <?php require './scripts.php' ?>
</body>

</html>
