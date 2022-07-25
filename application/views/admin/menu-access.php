  <div class="layout-page">
    <!-- Content wrapper -->
    <div class="content-wrapper">
      <!-- Content -->

      <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">Menu Access</h4>

        <!-- Bootstrap Table with Header - Dark -->
        <div class="card">
          <h5 class="card-header">Role : <?= $role_access['role']; ?></h5>
          <div class="table-responsive text-nowrap">
            <table class="table table-hover">
              <thead class="table">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Access</th>
                </tr>
              </thead>
              <tbody class="table">
                <?php

                $index = 0;

                foreach ($menuAccess as $access) {
                  echo
                  '<tr>
                  <th scope="row">' . ++$index . '</th>

                  <td>' . $access['title'] . '</td>
                  <td>
                      <div class="form-check">
                          <input class="form-check-input" type="checkbox" checked="checked" data-role="1" data-menu="2">
                      </div>
                  </td>
                </tr>';
                }

                ?>


              </tbody>
            </table>
          </div>
        </div>
        <!--/ Bootstrap Table with Header Dark -->

      </div>
      <!-- / Content -->

      <!-- Footer -->



    </div>
    <!-- Content wrapper -->
  </div>
  <!-- / Layout page -->
  </div>


  </div>
  <!-- / Layout wrapper -->