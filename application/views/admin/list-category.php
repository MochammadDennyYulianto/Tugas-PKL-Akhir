<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title><?= $title; ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon/favicon.ico'); ?>" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/boxicons.css'); ?>" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/core.css'); ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/theme-default.css'); ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/demo.css'); ?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= base_url('assets/vendor/js/helpers.js'); ?>"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url('assets/js/config.js'); ?>"></script>
  </head>

  <body>
    
        <div class="layout-page">

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">List Category</h4>

              <?php if (validation_errors()) : ?>  
                <div class="alert alert-danger" role="alert">
                      <?= validation_errors(); ?>
                </div>
              <?php endif; ?>

              <?= $this->session->flashdata('message'); ?>

                    <div class="row">
                        <div class="col-lg">
                          <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#newSubMenuModal">Add List Category</button>
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Url</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; ?>
                              <?php foreach ($listCategory as $lc) : ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $lc['title']; ?></td>
                                    <td><?= $lc['role']; ?></td>
                                    <td><?= $lc['url']; ?></td>
                                    <td><?= $lc['icon']; ?></td>
                                    <td><?= $lc['is_active']; ?></td>
                                    <td>
                                        <a href="" class="badge bg-success">edit</a>
                                        <a href="<?= base_url('admin/deletecategory/') . $lc['id']; ?>" class="badge bg-danger ">delete</a>
                                    </td>
                                </tr>
                              <?php $i++; ?>
                              <?php endforeach; ?>
                              
                            </tbody>
                            
                        </div>
                        
                    </div>
          </div>
          

            <!-- / Content -->






          </div>

          
          <!-- Content wrapper -->
        </div>
        
        <!-- / Layout page -->
      </div>

    </div>
    
    <!-- / Layout wrapper -->

    <div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubMenuModalLabel">Add List Category</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/listcategory'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group mb-4">
            <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
        </div>
        <div class="form-group mb-4">
            <select name="menu_id" id="menu_id" class="form-control">
                <option value="">Select Menu</option>
                <?php foreach ($listRole as $role) : ?>
                    <option value="<?= $role['id']; ?>"><?= $role['role']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mb-4">
            <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
        </div>
        <div class="form-group mb-4">
            <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
        </div>
        <div class="form-group mb-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                <label class="form-check-label" for="is_active">
                    Active?
                </label>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>