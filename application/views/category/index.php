  <!-- Assets Start -->
  <div class="wrapper" style="background-color: #CDCDCD;">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-lg-12 my-3 d-flex justify-content-start">
          <?php
          
          foreach ($filteredAssets as $asset)
          {
            echo
            '<a href="http://" class="text-decoration-none me-3">
            <div class="card h-100" style="width: 300px;">
              <img class="card-img-top" src="'.base_url($asset['url'].$asset['image']).'" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title">'.$asset['name'].'</h5>
              </div>
            </div>
          </a>';
          }

          ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Assets end -->
