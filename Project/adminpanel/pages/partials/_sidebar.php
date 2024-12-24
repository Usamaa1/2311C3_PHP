<?php include '../connection/connection.php' ?>
<?php


$roleId = $_SESSION['roleId'];
echo $roleId;
// echo $_SERVER['REQUEST_URI'];


$rolePermissionQuery = "SELECT * FROM `permissions` JOIN `permissionrole` ON permissions.permissions_id = permissionrole.permission_id WHERE permissionrole.role_id = :roleId";
$rolePermissionPrepare = $connect->prepare($rolePermissionQuery);
$rolePermissionPrepare->bindParam(':roleId', $_SESSION['roleId'], PDO::PARAM_INT);
$rolePermissionPrepare->execute();
$rolePermissionData = $rolePermissionPrepare->fetchAll(PDO::FETCH_ASSOC);


$isUserAvailable = false;
$isCityAvailable = false;
$isCountryAvailable = false;
$isCategoriesAvailable = false;
$isProductsAvailable = false;




?>



<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="../home/index.php">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>



    <?php
    foreach ($rolePermissionData as $rP) {
      if (str_contains($rP['permission_path'], 'categories')) {
        $isCategoriesAvailable = true;
      }
    }
    ?>


    <?php if ($isCategoriesAvailable) { ?>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
          <i class="icon-layout menu-icon"></i>
          <span class="menu-title">Categories</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="category">

          <ul class="nav flex-column sub-menu">
            <?php
            foreach ($rolePermissionData as $rolePermission) {
              if (str_contains($rolePermission['permission_path'], 'categories')) {
            ?>
                <li class="nav-item"> <a class="nav-link" href="../<?= $rolePermission['permission_path'] ?>"><?= $rolePermission['permission_name'] ?></a></li>

            <?php
              }
            }
            ?>
            <!-- <li class="nav-item"> <a class="nav-link" href="../categories/viewCategory.php">View Category</a></li> -->
          </ul>
        </div>
      </li>
    <?php } ?>
    
    <?php
    foreach ($rolePermissionData as $rP) {
      if (str_contains($rP['permission_path'], 'products')) {
        $isProductsAvailable = true;
      }
    }
    ?>


    <?php if ($isProductsAvailable) { ?>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="products">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Products</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="products">

        <ul class="nav flex-column sub-menu">
          <?php
          foreach ($rolePermissionData as $rolePermission) {
            if (str_contains($rolePermission['permission_path'], 'products')) {
          ?>
              <li class="nav-item"> <a class="nav-link" href="../<?= $rolePermission['permission_path'] ?>"><?= $rolePermission['permission_name'] ?></a></li>

          <?php
            }
          }
          ?>
          <!-- <li class="nav-item"> <a class="nav-link" href="../categories/viewCategory.php">View Category</a></li> -->
        </ul>
      </div>
    </li>
    <?php } ?>

    <?php
    foreach ($rolePermissionData as $rP) {
      if (str_contains($rP['permission_path'], 'country')) {
        $isCountryAvailable = true;
      }
    }
    ?>


    <?php if ($isCountryAvailable) { ?>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#country" aria-expanded="false" aria-controls="country">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Country</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="country">

        <ul class="nav flex-column sub-menu">
          <?php
          foreach ($rolePermissionData as $rolePermission) {
            if (str_contains($rolePermission['permission_path'], 'country')) {
          ?>
              <li class="nav-item"> <a class="nav-link" href="../<?= $rolePermission['permission_path'] ?>"><?= $rolePermission['permission_name'] ?></a></li>

          <?php
            }
          }
          ?>
          <!-- <li class="nav-item"> <a class="nav-link" href="../categories/viewCategory.php">View Category</a></li> -->
        </ul>
      </div>
    </li>   
     <?php } ?>


     <?php
    foreach ($rolePermissionData as $rP) {
      if (str_contains($rP['permission_path'], 'cities')) {
        $isCityAvailable = true;
      }
    }
    ?>


    <?php if ($isCityAvailable) { ?>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#cities" aria-expanded="false" aria-controls="cities">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Cities</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="cities">

        <ul class="nav flex-column sub-menu">
          <?php
          foreach ($rolePermissionData as $rolePermission) {
            if (str_contains($rolePermission['permission_path'], 'cities')) {
          ?>
              <li class="nav-item"> <a class="nav-link" href="../<?= $rolePermission['permission_path'] ?>"><?= $rolePermission['permission_name'] ?></a></li>

          <?php
            }
          }
          ?>
          <!-- <li class="nav-item"> <a class="nav-link" href="../categories/viewCategory.php">View Category</a></li> -->
        </ul>
      </div>
    </li>
    <?php } ?>
    <?php
    foreach ($rolePermissionData as $rP) {
      if (str_contains($rP['permission_path'], 'users/')) {
        $isUserAvailable = true;
      }
    }
    ?>


    <?php if ($isUserAvailable) { ?>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">User Roles & Permissions</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="users">

        <ul class="nav flex-column sub-menu">
          <?php
          foreach ($rolePermissionData as $rolePermission) {
            if (str_contains($rolePermission['permission_path'], 'users')) {
          ?>
              <li class="nav-item"> <a class="nav-link" href="../<?= $rolePermission['permission_path'] ?>"><?= $rolePermission['permission_name'] ?></a></li>

          <?php
            }
          }
          ?>
          <!-- <li class="nav-item"> <a class="nav-link" href="../categories/viewCategory.php">View Category</a></li> -->
        </ul>
      </div>
    </li>
    <?php } ?>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">UI Elements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
        <i class="icon-columns menu-icon"></i>
        <span class="menu-title">Form elements</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <i class="icon-bar-graph menu-icon"></i>
        <span class="menu-title">Charts</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">ChartJs</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="icon-grid-2 menu-icon"></i>
        <span class="menu-title">Tables</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
        <i class="icon-contract menu-icon"></i>
        <span class="menu-title">Icons</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="icons">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
        <i class="icon-ban menu-icon"></i>
        <span class="menu-title">Error pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="error">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
          <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/documentation/documentation.html">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">Documentation</span>
      </a>
    </li>
  </ul>
</nav>