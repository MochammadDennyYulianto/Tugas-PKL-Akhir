  <!-- Search Start -->
  <div class="container">
    <div class="row my-3">
      <form action="<?= base_url('category/search')?>" method="post">
        <div class="col-md-4">
          <div class="input-group input-group-lg">
            <input type="text" class="form-control form-control-sm" placeholder="Search your need..." name="keyword">
            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- Search End -->

  <!-- Shortcut Start -->
  <div class="container">
    <div class="row">
      <div class="d-flex">
        <h5 class="my-auto me-3">Shortcut</h5>
        <?php

        foreach ($getAllCategory as $category) {
          echo
          '<a
            href="' . base_url('category/view/' . strtolower($category['category'])) . '"
            class="badge me-2 text-decoration-none"
            style="
              background-color: ' . $category['bg_color'] . ';
              font-size: large;
            ">
            <i class="' . $category['icon'] . ' bx-sm me-1"></i>'
            . str_replace('_', ' ', $category['category']) .
            '</a>';
        }

        ?>
      </div>
    </div>
  </div>
  <!-- Shortcut End -->

  <hr class="my-3" />