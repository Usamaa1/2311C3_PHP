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

            $userRoleQuery = "SELECT * FROM `role`";
            $userRolePrepare = $connect->prepare($userRoleQuery);
            $userRolePrepare->execute();
            $userRoleData = $userRolePrepare->fetchAll(PDO::FETCH_ASSOC);








            if(isset($_POST['addUserBtn'])){



                $firstName = $_POST['userName'];
                $email = $_POST['userEmail'];
                $userPassword = $_POST['userPassword'];
                $roleId = $_POST['userRole'];

                $password = password_hash($userPassword,PASSWORD_BCRYPT);






                $userAddQuery = "INSERT INTO `users`(`first_name`,`email`, `password`, `role_id`) VALUES (:firstName,:email,:password,:roleId)";
                $userAddPrepare = $connect->prepare($userAddQuery);
                $userAddPrepare->bindParam(':firstName', $firstName, PDO::PARAM_STR);
                $userAddPrepare->bindParam(':email', $email, PDO::PARAM_STR);
                $userAddPrepare->bindParam(':password', $password, PDO::PARAM_STR);
                $userAddPrepare->bindParam(':roleId', $roleId, PDO::PARAM_INT);
                if ($userAddPrepare->execute()) {
                    echo "<script>alert('User Added Successfully')</script>";
                }
    
            }







            ?>




            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add User</h4>
                                    <p class="card-description">
                                        Add User
                                    </p>
                                    <form class="forms-sample" method="post">
                                        <div class="form-group">
                                            <label for="exampleInputName1">User Name</label>
                                            <input type="text" class="form-control" id="exampleInputName1" name="userName" placeholder="User Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">User Email</label>
                                            <input type="text" class="form-control" id="exampleInputName1" name="userEmail" placeholder="User Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">User Password</label>
                                            <input type="text" class="form-control" id="exampleInputName1" name="userPassword" placeholder="User Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName1">User Role</label>
                                            <select name="userRole" id="" class="form-control">
                                                <option value="" selected disabled>Select user role...</option>

                                                <?php foreach ($userRoleData as $userRole) { ?>
                                                    <option value="<?= $userRole['role_id'] ?>"><?= $userRole['role_name'] ?></option>
                                                <?php } ?>



                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2" name="addUserBtn">Add User</button>
                                    </form>
                                </div>
                            </div>
                        </div>






                        <?php require "../partials/_footer.php" ?>

                    </div>
                </div>
            </div>