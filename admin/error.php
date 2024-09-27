<div class="dashboard-main-body">
  <div class="card basic-data-table">
    <div class="card-body py-80 px-32 text-center">
      <img src="assets/images/error-img.png" alt="" class="mb-24">
      <h6 class="mb-16">Page not Found</h6>
      <p class="text-secondary-light">Sorry, the page you are looking for doesn’t exist</p>
      <a href="dashboard" class="btn btn-primary-600 radius-8 px-20 py-11">Back to Home</a>
    </div>
  </div>
</div>


</footer>
<style>
  .dashboard-main-body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Full height of the viewport */
    margin: 0;
  }

  .card.basic-data-table {
    max-width: 500px;
    width: 100%;
  }
</style>


  <!-- Add Content Modal -->
  <div id="addContentModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addContentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addContentModalLabel">Add New Content</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="postprocess" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <!-- Title Field -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="dtitle" required>
                                    </div>
                                </div>

                                <!-- Cover Image Field -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="basic-upload" class="form-label fw-semibold text-primary-light text-sm mb-4">Image<span class="text-danger">*</span></label>
                                        <input type="file" class="form-control w-auto mt-24 form-control-lg" id="basic-upload" name="dimage" required>
                                    </div>
                                </div>
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
                                        <textarea name="description" class="form-control radius-8 editor" id="desc" placeholder="Write description..." required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row justify-content-end">
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>