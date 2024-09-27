<?php 
require './head.php'; 
?>

<body>
    <?php require './sidebar.php'; ?>

    <main class="dashboard-main">
        <?php 
        require './header.php';
        require './successerror.php'; // Handle success and error messages
        ?>

        <div class="dashboard-main-body">
            <!-- Header Section -->
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
                <h6 class="fw-semibold mb-0">Subcategory</h6>
                <ul class="d-flex align-items-center gap-2">
                    <li class="fw-medium">
                        <a href="dashboard" class="d-flex align-items-center gap-1 hover-text-primary">
                            <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Subcategory Table Section -->
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-sm-flex d-block">
                            <div class="me-auto mb-sm-0 mb-3">
                                <h4 class="card-title mb-2">Subcategory</h4>
                            </div>
                            <!-- Add Subcategory Button -->
                            <a href="javascript:void(0);" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#manageWalletModal" onclick="showAddModal()">+ Add Subcategory</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover style-1 bordered-table mb-0" id="dataTable" data-page-length='10'>
                                    <thead>
                                        <tr>
                                            <th>CATEGORY</th>
                                            <th>SUBCATEGORY</th>
                                            <th>DATE</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Fetch subcategories from the database
                                        $query = "SELECT * FROM subcategory";
                                        $result = $conn->query($query);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td><?= htmlspecialchars($row['category']); ?></td>
                                                    <td><?= htmlspecialchars($row['subcategory']); ?></td>
                                                    <td><?= htmlspecialchars($row['date']); ?></td>
                                                    <td>
                                                        <div class="d-flex action-button">
                                                            <!-- Edit Button -->
                                                            <a href="javascript:void(0);" class="btn btn-info btn-xs light px-2" onclick="showEditModal('<?= $row['id']; ?>', '<?= htmlspecialchars($row['category']); ?>', '<?= htmlspecialchars($row['subcategory']); ?>')" data-bs-toggle="modal" data-bs-target="#manageWalletModal">
                                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </svg>
                                                            </a>
                                                            <!-- Delete Button -->
                                                            <a href="javascript:void(0);" class="ms-2 btn btn-xs px-2 light btn-danger" onclick="confirmDelete('<?= $row['id']; ?>')">
                                                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M3 6H5H21" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M8 6V4C8 3.46957 8.21071 2.96086 8.58579 2.58579C8.96086 2.21071 9.46957 2 10 2H14C14.5304 2 15.0391 2.21071 15.4142 2.58579C15.7893 2.96086 16 3.46957 16 4V6M19 6V20C19 20.5304 18.7893 21.0391 18.4142 21.4142C18.0391 21.7893 17.5304 22 17 22H7C6.46957 22 5.96086 21.7893 5.58579 21.4142C5.21071 21.0391 5 20.5304 5 20V6H19Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='4'>No subcategories found.</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Manage Subcategory Modal -->
                    <div class="modal fade" id="manageWalletModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="walletModalTitle">Edit Subcategory</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="manageWalletForm" method="post" action="updatesub">
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
                                        <div class="mb-3">
                                            <label for="subcategory" class="form-label">Subcategory</label>
                                            <input type="text" class="form-control" id="subcategory" name="subcategory" required>
                                        </div>
                                      
                                        <input type="hidden" id="walletId" name="walletId">
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="saveChanges" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    <?php require './footer.php'; ?>
    </main>

    <?php require './scripts.php'; ?>

    <script>
        function showEditModal(id, category, subcategory) {
            document.getElementById('walletModalTitle').textContent = 'Edit Subcategory';
            document.getElementById('category').value = category;
            document.getElementById('subcategory').value = subcategory;
            document.getElementById('walletId').value = id;
            document.querySelector('button[name="saveChanges"]').innerText = 'Updatesub';
        }

        function showAddModal() {
            document.getElementById('walletModalTitle').textContent = 'Add Subcategory';
            document.getElementById('manageWalletForm').reset();
            document.getElementById('walletId').value = '';
            document.querySelector('button[name="saveChanges"]').innerText = 'Add';
        }

        function confirmDelete(id) {
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
                    window.location.href = `deletesub?id=${id}`;
                }
            })
        }
    </script>
</body>
</html>
