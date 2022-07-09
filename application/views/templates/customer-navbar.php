<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
  <a href="<?= base_url('customer'); ?>" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
    <h2 class="m-0"><i class="fa fa-car text-primary me-2"></i>denzal</h2>
  </a>
  <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <div class="navbar-nav ms-auto p-4 p-lg-0">
      <a href="<?= base_url('customer'); ?>" class="nav-item nav-link">Home</a>
      <a href="about.html" class="nav-item nav-link">About</a>
      <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
        <div class="dropdown-menu bg-light m-0">
          <a href="feature.html" class="dropdown-item">Features</a>
          <a href="appointment.html" class="dropdown-item">Appointment</a>
          <a href="team.html" class="dropdown-item">Our Team</a>
          <a href="testimonial.html" class="dropdown-item">Testimonial</a>
          <a href="404.html" class="dropdown-item">404 Page</a>
        </div>
      </div>
      <?php
      
      if ($this->session->userdata('email'))
      {
        echo
        '</div>
        <div class="btn-group" id="custom-dropdown">
          <a class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="avatar avatar-online mt-2 me-4">
              <img src="'.base_url('assets/img/avatars/1.png').'" alt class="w-px-40 h-auto rounded-circle" />
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="#">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                    <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </div>
                <div class="flex-grow-1">
                  <span class="fw-semibold d-block">John Doe</span>
                  <small class="text-muted">Admin</small>
                </div>
                </div>
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="'.base_url('customer/editprofile').'">
                <i class="bx bx-user me-2"></i>
                <span class="align-middle">My Profile</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <i class="bx bx-cog me-2"></i>
                <span class="align-middle">Settings</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <span class="d-flex align-items-center align-middle">
                  <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                  <span class="flex-grow-1 align-middle">Billing</span>
                  <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                </span>
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="'.base_url('auth/logout').'">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Log Out</span>
              </a>
            </li>
          </ul>
        </div>';
      }
      else
      {
        echo
        '<a href="'.base_url('auth').'" class="nav-item nav-link">Sign in</a>
        </div>
        <a href="'.base_url('auth/registration').'" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Sign up<i class="fa fa-arrow-right ms-3"></i></a>';
      }
      
      ?>
  </div>
</nav>
<!-- Navbar End -->
<hr class="m-0" />