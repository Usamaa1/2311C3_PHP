
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
      <?php require "../partials/_navbar.php"; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
     <?php require "../partials/_settings-panel.php" ?>

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
     <?php require "../partials/_sidebar.php" ?>
      <!-- partial -->
      
      
      <!-- connection -->
      <!-- connection:../connection/connection.php -->
     <!-- <?php require "../connection/connection.php" ?> -->
      <!-- connection -->




      <?php
        $id = $_GET['id'];


        $viewQuery = "SELECT * FROM `categories` WHERE category_id = :id";
        $viewPrepare = $connect->prepare($viewQuery);
        $viewPrepare->bindParam(':id',$id,PDO::PARAM_INT);
        $viewPrepare->execute();
        $categoriesData = $viewPrepare->fetchAll(PDO::FETCH_ASSOC);
        $categoriesData = $categoriesData[0];




        if(isset($_POST['btn']))
        {
          if(empty($_POST['categoryName']))
          {
            echo "<script>alert('Feild is Empty')</script>";
          }
          else
          {
            $categoryName = $_POST['categoryName'];

            $insertQuery= "UPDATE `categories` SET `category_name`=:categoryName WHERE category_id = :id";

            $insertPrepare = $connect->prepare($insertQuery);
            $insertPrepare->bindParam(':categoryName',$categoryName,PDO::PARAM_STR);
            $insertPrepare->bindParam(':id',$id,PDO::PARAM_INT);

            if($insertPrepare->execute()){
              echo "<script>alert('Category Edited successfully!')</script>";
              header('location:viewCategory.php');
            }

          }
        }

      ?>



      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
        <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Category</h4>
                  <p class="card-description">
                   Edit Categories
                  </p>
                  <form class="forms-sample" method="post">
                    <div class="form-group">
                      <label for="exampleInputName1">Category Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" value="<?= $categoriesData['category_name'] ?>" name="categoryName" placeholder="Category Name">
                    </div>
                
                    <button type="submit" class="btn btn-primary mr-2" name="btn">Edit Category</button>
                  </form>
                </div>
              </div>
            </div>






      <?php require "../partials/_footer.php" ?>

      </div>
</div>
</div>