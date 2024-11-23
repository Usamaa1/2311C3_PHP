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
      <?php require "../connection/connection.php" ?>
      <!-- connection -->




      <?php




      $categoryQuery = "SELECT * FROM `categories`";
      $categoryPrepare = $connect->prepare($categoryQuery);
      $categoryPrepare->execute();
      $CategroyData = $categoryPrepare->fetchAll(PDO::FETCH_ASSOC);







      if (isset($_POST['btn'])) {
        
      
          $prodName = $_POST['prodName'];
          $prodPrice = $_POST['prodPrice'];
          $prodRating = $_POST['prodRating'];
          $categoryId = $_POST['categoryId'];
          $prodDesc = $_POST['prodDesc'];
          $btn = $_POST['btn'];

          $prodImage = $_FILES['prodImage'];


          if($prodImage['size'] < 5000000)
          {

            $ext = explode(".",$prodImage['name']);

            $ext= $ext[1];
            $uniqueName = uniqid();

            $imageName = $uniqueName . "." . $ext;


            move_uploaded_file($prodImage['tmp_name'],"../images/$imageName");



            $insertQuery = "INSERT INTO `products`(`prod_name`, `prod_price`, `prod_rating`, `prod_desc`, `prod_image`, `category_id`) VALUES (:prodName,:prodPrice, :prodRating,:prodDesc,:imageName,:categoryId)";

            $insertPrepare = $connect->prepare($insertQuery);
            $insertPrepare->bindParam(':prodName', $prodName, PDO::PARAM_STR);
            $insertPrepare->bindParam(':prodPrice', $prodPrice);
            $insertPrepare->bindParam(':prodRating', $prodRating);
            $insertPrepare->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
            $insertPrepare->bindParam(':prodDesc', $prodDesc, PDO::PARAM_STR);
            $insertPrepare->bindParam(':imageName', $imageName, PDO::PARAM_STR);
  
            if ($insertPrepare->execute()) {
              echo "<script>alert('Product added successfully!')</script>";
            }
          }
          else
          {
            echo "<script>alert('Image size should be less than 5Mb')</script>";

          }




         
        }
      

      ?>


















      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Product</h4>
                  <p class="card-description">
                    Add Product
                  </p>
                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="exampleInputName1">Product Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="prodName" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Product Price</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="prodPrice" placeholder="Product Price">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Product Rating</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="prodRating" placeholder="Product Rating">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Category</label>
                      <select class="form-control" name="categoryId" id="exampleSelectGender">
                        <?php foreach ($CategroyData as $c) { ?>

                          <option value="<?= $c['category_id'] ?>"><?= $c['category_name'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Product Description</label>
                      <textarea class="form-control" id="exampleTextarea1" name="prodDesc" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="prodImage" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="btn">Add Product</button>
                  </form>
                </div>
              </div>
            </div>






            <?php require "../partials/_footer.php" ?>
            <script src="../../js/file-upload.js"></script>

          </div>
        </div>
      </div>