<?php require './head.php' ?>

<body>
  <?php require './sidebar.php' ?>

  <main class="dashboard-main">
    <?php require './header.php';
    require './successerror.php'?>

    <div class="dashboard-main-body">
      <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Dashboard</h6>
        <ul class="d-flex align-items-center gap-2">
          <li class="fw-medium">
            <a href="dashboard" class="d-flex align-items-center gap-1 hover-text-primary">
              <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
              Dashboard
            </a>
          </li>
          <!-- <li>-</li>
          <li class="fw-medium">Investment</li> -->
        </ul>
      </div>

      <div class="row gy-4">

        <!-- Dashboard Widget Start -->
        <div class="col-xxl-3 col-sm-6">
    

          <div class="card px-24 py-16 shadow-none radius-8 border h-100 bg-gradient-start-3">
            <a href="dashboard">
              <div class="card-body p-0">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                  <div class="d-flex align-items-center">

                    <div class="w-64-px h-64-px radius-16 bg-base-50 d-flex justify-content-center align-items-center me-20">
                      <span class="mb-0 w-40-px h-40-px bg-primary-600 flex-shrink-0 text-white d-flex justify-content-center align-items-center radius-8 h6 mb-0">
                        <iconify-icon icon="flowbite:users-group-solid" class="icon"></iconify-icon>
                      </span>
                    </div>

                    <div>
                      <span class="mb-2 fw-medium text-secondary-light text-md">Dashoard</span>
                      <h6 class="fw-semibold my-1">Dashboard</h6>
                      <p class="text-sm mb-0">
                        <span class="bg-success-focus px-1 rounded-2 fw-medium text-success-main text-sm">+4</span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>

        </div>

        <!-- Dashboard Widget End -->
         

        <!-- Dashboard Widget Start -->
        <div class="col-xxl-3 col-sm-6">
          <div class="card px-24 py-16 shadow-none radius-8 border h-100 bg-gradient-start-5">
            <a href="categories">
              <div class="card-body p-0">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                  <div class="d-flex align-items-center">

                    <div class="w-64-px h-64-px radius-16 bg-base-50 d-flex justify-content-center align-items-center me-20">
                      <span class="mb-0 w-40-px h-40-px bg-red flex-shrink-0 text-white d-flex justify-content-center align-items-center radius-8 h6 mb-0">
                        <iconify-icon icon="fa6-solid:file-invoice-dollar" class="text-white text-2xl mb-0"></iconify-icon>
                        
                      </span>
                    </div>

                    <div>
                      <span class="mb-2 fw-medium text-secondary-light text-md">Categories</span>
                      <h6 class="fw-semibold my-1">6</h6>
                      <p class="text-sm mb-0">Category post
                        <span class="bg-success-focus px-1 rounded-2 fw-medium text-success-main text-sm">+6</span> this week
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!-- Dashboard Widget End -->

        <!-- Dashboard Widget Start -->
        <div class="col-xxl-3 col-sm-6">
          <div class="card px-24 py-16 shadow-none radius-8 border h-100 bg-gradient-start-4">
            <a href="subcategory">
              <div class="card-body p-0">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                  <div class="d-flex align-items-center">

                    <div class="w-64-px h-64-px radius-16 bg-base-50 d-flex justify-content-center align-items-center me-20">
                      <span class="mb-0 w-40-px h-40-px bg-success-main flex-shrink-0 text-white d-flex justify-content-center align-items-center radius-8 h6 mb-0">
                        <iconify-icon icon="streamline:bag-dollar-solid" class="icon"></iconify-icon>
                      </span>
                    </div>

                    <div>
                      <span class="mb-2 fw-medium text-secondary-light text-md">Subcategories</span>
                      <h6 class="fw-semibold my-1">Categories</h6>
                      <p class="text-sm mb-0">Increase by
                        <span class="bg-success-focus px-1 rounded-2 fw-medium text-success-main text-sm">+4</span> this week
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!-- Dashboard Widget End -->
        <!-- Dashboard Widget Start -->
        <div class="col-xxl-3 col-sm-6">
          <div class="card px-24 py-16 shadow-none radius-8 border h-100 bg-gradient-start-3">
            <a href="profile">
              <div class="card-body p-0">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                  <div class="d-flex align-items-center">

                    <div class="w-64-px h-64-px radius-16 bg-base-50 d-flex justify-content-center align-items-center me-20">
                      <span class="mb-0 w-40-px h-40-px bg-primary-600 flex-shrink-0 text-white d-flex justify-content-center align-items-center radius-8 h6 mb-0">
                        <iconify-icon icon="flowbite:users-group-solid" class="icon"></iconify-icon>
                      </span>
                    </div>

                    <div>
                      <span class="mb-2 fw-medium text-secondary-light text-md">Profile</span>
                      <h6 class="fw-semibold my-1">Admin Profile</h6>
                      <p class="text-sm mb-0">Admin
                        <span class="bg-success-focus px-1 rounded-2 fw-medium text-success-main text-sm">1</span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!-- Dashboard Widget End -->
   

        <div class="col-xxl-3 col-sm-6">
    

    <div class="card px-24 py-16 shadow-none radius-8 border h-100 bg-gradient-start-3">
      <a href="active">
        <div class="card-body p-0">
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
            <div class="d-flex align-items-center">

              <div class="w-64-px h-64-px radius-16 bg-base-50 d-flex justify-content-center align-items-center me-20">
                <span class="mb-0 w-40-px h-40-px bg-primary-600 flex-shrink-0 text-white d-flex justify-content-center align-items-center radius-8 h6 mb-0">
                  <iconify-icon icon="flowbite:users-group-solid" class="icon"></iconify-icon>
                </span>
              </div>

              <div>
                <span class="mb-2 fw-medium text-secondary-light text-md">Active Post</span>
                <h6 class="fw-semibold my-1">Active Post</h6>
                <p class="text-sm mb-0">
                  <span class="bg-success-focus px-1 rounded-2 fw-medium text-success-main text-sm">+4</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

  </div>

  <div class="col-xxl-3 col-sm-6">
    

          <div class="card px-24 py-16 shadow-none radius-8 border h-100 bg-gradient-start-3">
            <a href="post">
              <div class="card-body p-0">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-1 mb-8">
                  <div class="d-flex align-items-center">

                    <div class="w-64-px h-64-px radius-16 bg-base-50 d-flex justify-content-center align-items-center me-20">
                      <span class="mb-0 w-40-px h-40-px bg-primary-600 flex-shrink-0 text-white d-flex justify-content-center align-items-center radius-8 h6 mb-0">
                        <iconify-icon icon="flowbite:users-group-solid" class="icon"></iconify-icon>
                      </span>
                    </div>

                    <div>
                      <span class="mb-2 fw-medium text-secondary-light text-md">Post/pending Post</span>
                      <h6 class="fw-semibold my-1">Dashboard</h6>
                      <p class="text-sm mb-0">
                        <span class="bg-success-focus px-1 rounded-2 fw-medium text-success-main text-sm">+4</span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>

        </div>

      </div>

    </div>

    <?php require './footer.php' ?>
  </main>

 <?php require './scripts.php' ?>

</body>

</html>