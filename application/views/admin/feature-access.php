<!-- Layout container -->
<div class="layout-page">
  <!-- Navbar -->

  

  <!-- / Navbar -->

  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">Feature Access</h4>

      <!-- Basic Bootstrap Table -->
      <div class="card">
        <!-- <h5 class="card-header">Feature Access</h5> -->
        <div class="table-responsive text-nowrap fw-bolder" >
          <table class="table table-hover">
            <thead>
              <tr>
                <th cscope="col">#</th>
                <th scope="col">Role</th>
                <th scope="col">Profile</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
              <tbody>
                <?php
                
                  foreach ($listRole as $role)
                  {
                    echo
                    '<tr>
                      <th scope="row">3</th>
                      <td>'.$role['role'].'</td>
                      <td>
                        <ul class="list-unstyled users-list m-1 avatar-group d-flex align-items-xl-center">';

                    foreach($allProfile as $profile)
                    {
                      if ($profile['role_id'] == $role['id'])
                      {
                        echo
                        '<li
                          data-bs-toggle="tooltip"
                          data-popup="tooltip-custom"
                          data-bs-placement="top"
                          class="avatar avatar-xm pull-up"
                          title="'.$profile['name'].'"
                          >
                          <img src="'.base_url('assets/img/avatars/').$profile['image'].'" alt="Avatar" class="rounded-circle" />
                        </li>';
                      }

                    }

                    echo
                        '</ul>
                      </td>  
                      <td>
                        <a href="'.base_url('admin/menuaccess/').$role['id'].'" class="badge bg-warning">Access</a>
                        <a href="'.base_url('admin/featureaccess/edit').'" class="badge bg-success">Edit</a>
                      </td>
                    </tr>';

                  }

                ?>
                  <!-- <tr>
                    <th scope="row">1</th>
                    <td>Admin</td>
                    <td>
                      <ul class="list-unstyled users-list m-1 avatar-group d-flex align-items-xl-center">
                        <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top" 
                      class="avatar avatar-xm pull-up"
                      title="Jojo Virgas"
                    >
                      <img src="<?= base_url('assets/img/avatars/boss.png'); ?>" alt="Avatar" class="rounded-circle" />
                    </li>
                      </ul>
                    </td>
                    <td>
                      <a href="<?= base_url('admin/menuaccess'); ?>" class="badge bg-warning">Access</a>
                      <a href="<?= base_url('admin/featureaccess/edit'); ?>" class="badge bg-success">Edit</a>

                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Creator</td>
                    <td>
                      <ul class="list-unstyled users-list m-1 avatar-group d-flex align-items-xl-center">
                        <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xm pull-up"
                      title="Zarga Lmao"
                    >
                      <img src="<?= base_url('assets/img/avatars/black.png'); ?>" alt="Avatar" class="rounded-circle" />
                    </li>
                        <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xm pull-up"
                      title="Wanda Carrylin"
                    >
                      <img src="<?= base_url('assets/img/avatars/siti.png'); ?>" alt="Avatar" class="rounded-circle" />
                    </li>
                        <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xm pull-up"
                      title="Thomas Slebew"
                    >
                      <img src="<?= base_url('assets/img/avatars/businessman.png'); ?>" alt="Avatar" class="rounded-circle" />
                    </li>
                      </ul>
                    </td>
                    <td>
                      <a href="<?= base_url('admin/menuaccess'); ?>" class="badge bg-warning">Access</a>
                      <a href="<?= base_url('admin/featureaccess/edit'); ?>" class="badge bg-success">Edit</a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Subscriber</td>
                    <td>
                      <ul class="list-unstyled users-list m-1 avatar-group d-flex align-items-xl-center">
                        <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xm pull-up"
                      title="Udin Raka"
                    >
                      <img src="<?= base_url('assets/img/avatars/udin.png'); ?>" alt="Avatar" class="rounded-circle" />
                    </li>
                        <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xm pull-up"
                      title="Jojo Kentir"
                    >
                      <img src="<?= base_url('assets/img/avatars/joko.png'); ?>" alt="Avatar" class="rounded-circle" />
                    </li>
                        <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xm pull-up"
                      title="Carrisa Nayla"
                    >
                      <img src="<?= base_url('assets/img/avatars/nayla.png'); ?>" alt="Avatar" class="rounded-circle" />
                    </li>
                        <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xm pull-up"
                      title="Yanto Garo"
                    >
                      <img src="<?= base_url('assets/img/avatars/rapi.png'); ?>" alt="Avatar" class="rounded-circle" />
                    </li>
                      </ul>
                    </td>
                    <td>
                      <a href="<?= base_url('admin/menuaccess'); ?>" class="badge bg-warning">Access</a>
                      <a href="<?= base_url('admin/featureaccess/edit'); ?>" class="badge bg-success">Edit</a>

                    </td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Customer</td>
                    <td>
                      <ul class="list-unstyled users-list m-1 avatar-group d-flex align-items-xl-center">
                        <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xm pull-up"
                      title="Adi Slamet"
                    >
                      <img src="<?= base_url('assets/img/avatars/cute.png'); ?>" alt="Avatar" class="rounded-circle" />
                    </li>
                        <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xm pull-up"
                      title="Raisa Melati"
                    >
                      <img src="<?= base_url('assets/img/avatars/raisa.png'); ?>" alt="Avatar" class="rounded-circle" />
                    </li>
                        <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xm pull-up"
                      title="Joseph Setiawan"
                    >
                      <img src="<?= base_url('assets/img/avatars/kece.png'); ?>" alt="Avatar" class="rounded-circle" />
                    </li>
                        <li
                      data-bs-toggle="tooltip"
                      data-popup="tooltip-custom"
                      data-bs-placement="top"
                      class="avatar avatar-xm pull-up"
                      title="Cristian Aji"
                    >
                      <img src="<?= base_url('assets/img/avatars/human.png'); ?>" alt="Avatar" class="rounded-circle" />
                    </li>
                      </ul>
                    </td>
                      <td>
                      <a href="<?= base_url('admin/menuaccess'); ?>" class="badge bg-warning">Access</a>
                      <a href="<?= base_url('admin/editaccess'); ?>" class="badge bg-success">Edit</a>

                    </td>
                  </tr> -->

                </tbody>
          </table>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->

      
  <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
<footer class="sticky-lg-bottom mt-5 mb-0">
    <div class="container my-5 mt-5 mb-5">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; DENZAL : Denny & Rizal <?= date('Y'); ?> </span>
        </div>
    </div>
</footer>

