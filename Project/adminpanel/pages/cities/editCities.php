
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
        $id = $_GET['id'];

        
        
        $viewQuery = "SELECT * FROM `cities` JOIN `country` ON cities.country_id = country.country_id WHERE city_id = :id";
        $viewPrepare = $connect->prepare($viewQuery);
        $viewPrepare->bindParam(':id',$id,PDO::PARAM_INT);
        $viewPrepare->execute();
        $singleCityData = $viewPrepare->fetch(PDO::FETCH_ASSOC);

        // echo "<pre>";
        // print_r($singleCityData);
        // echo "</pre>";
      
      $viewQuery = "SELECT * FROM `country`";
      $viewPrepare = $connect->prepare($viewQuery);
      $viewPrepare->execute();
      $countryData = $viewPrepare->fetchAll(PDO::FETCH_ASSOC);


        if(isset($_POST['btn']))
        {
          if(empty($_POST['cityName']))
          {
            echo "<script>alert('Feild is Empty')</script>";
          }
          else
          {
            $cityName = $_POST['cityName'];
            $countryId = $_POST['countryId'];

            $insertQuery= "UPDATE `cities` SET `city_name`=:cityName, `country_id`=:countryId WHERE city_id = :id";

            $insertPrepare = $connect->prepare($insertQuery);
            $insertPrepare->bindParam(':cityName',$cityName,PDO::PARAM_STR);
            $insertPrepare->bindParam(':countryId',$countryId,PDO::PARAM_STR);
            $insertPrepare->bindParam(':id',$id,PDO::PARAM_INT);

            if($insertPrepare->execute()){
              echo "<script>alert('City Edited successfully!')</script>";
              header('location:viewCities.php');
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
                  <h4 class="card-title">Edit Country</h4>
                  <p class="card-description">
                   Edit Country
                  </p>
                  <form class="forms-sample" method="post">
                  <div class="form-group">
                      <label for="exampleInputName1">Select Country</label>
                      <select name="countryId" class="form-control">
                        <option selected disabled><?= $singleCityData['country_name'] ?>(Previous Data)</option>
                        <?php foreach($countryData as $cData){ ?>
                        <option value="<?= $cData['country_id'] ?>"><?= $cData['country_name'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Country Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" value="<?= $singleCityData['city_name'] ?>" name="cityName" placeholder="City Name">
                    </div>
                
                    <button type="submit" class="btn btn-primary mr-2" name="btn">Edit Country</button>
                  </form>
                </div>
              </div>
            </div>






      <?php require "../partials/_footer.php" ?>

      </div>
</div>
</div>