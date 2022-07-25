<!-- Cover Start -->
<div class="d-flex h-100 text-center text-white masthead" data-new-gr-c-s-check-loaded="14.1064.0" data-gr-ext-installed="" data-new-gr-c-s-loaded="14.1064.0">
  <main class="cover-container d-flex w-100 h-100 mx-auto flex-column">
    <h1 style="color: #ffffff;">Start Your Adventure</h1>
    <p class="lead">
      Download Free Icons and Stickers for your projects. Resources made by and for designers. PNG, SVG, EPS, PSD and CSS formats
    </p>

    <!-- Search bar start -->
    <div class="row mt-1">
      <form action="" method="post">
        <div class="col-lg">
          <div class="input-group input-group-lg">
            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Assets</button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another</a></li>
              <li><a class="dropdown-item" href="#">Something</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Separated</a></li>
            </ul>
            <input type="text" class="form-control form-control-sm" placeholder="Search your need..." name="keyword">
            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form>
    </div>
    <!-- Search bar end -->

  </main>
</div>
<!-- Cover End -->

<div class="bg-info d-flex justify-content-center py-4">
  <h4 class="pe-5 pt-1">Become subscriber</h4>
  <button type="button" class="btn btn-primary">Start now</button>
</div>

<!-- Category start -->
<div class="container">
  <div class="row my-5">
    <?php

    foreach ($getAllCategory as $category) {
      echo
      '<div class="col-lg justify-content-center text-center">
        <div
          class="card custom-card mx-auto"
          style="
            background-color: ' . $category['bg_color'] . ';
            color: ' . $category['icon_color'] . ';
          ">
          <i class="' . $category['icon'] . ' bx-lg"></i>
          <a class="overlay" href="' . base_url('category/view/' . strtolower($category['category'])) . '">
            <div class="text">' . str_replace('_', ' ', $category['category']) . '</div>
          </a>
        </div>
        <div class="card-body">
          <h5 class="card-title">' . str_replace('_', ' ', $category['category']) . '</h5>
        </div>
      </div>';
    }

    ?>
  </div>
</div>
<!-- Category end -->

<div class="my-5">&#x2800;</div>

<!-- Trend start -->
<div class="container my-5">
  <div class="row">
    <h2>Trend Templates</h2>
    <div class="col-md-10 col-lg-12 my-3 d-flex justify-content-between">
      <?php

      foreach ($filteredAssets as $asset) {
        echo
        '<a href="http://" class="text-decoration-none me-3">
            <div class="card h-100" style="width: 300px;">
              <img class="card-img-top" src="' . base_url($asset['url'] . $asset['image']) . '" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title">' . $asset['name'] . '</h5>
              </div>
            </div>
          </a>';
      }

      ?>
    </div>
  </div>
</div>
<!-- Trend end -->

<div class="container">
  <div class="row">
    <div class="col-lg d-flex justify-content-center">
      <a href="<?= base_url('category/viewall'); ?>" rel="noopener noreferrer" class="text-decoration-none">
        <button type="button" class="btn py-4 px-lg-5 d-none d-lg-block">
          View All
          <i class="fa fa-arrow-right ms-3"></i>
        </button>
      </a>
    </div>
  </div>
</div>