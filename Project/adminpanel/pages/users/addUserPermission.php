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



            $userRoleQuery = "SELECT * FROM `role`";
            $userRolePrepare = $connect->prepare($userRoleQuery);
            $userRolePrepare->execute();
            $userRoleData = $userRolePrepare->fetchAll(PDO::FETCH_ASSOC);
           
           
            $userPermissionQuery = "SELECT * FROM `permissions`";
            $userPermissionPrepare = $connect->prepare($userPermissionQuery);
            $userPermissionPrepare->execute();
            $userPermissionData = $userPermissionPrepare->fetchAll(PDO::FETCH_ASSOC);





            // if (isset($_POST['addUserRoleBtn'])) {



            //     $userRole = $_POST['userRole'];



            //     $userAddQuery = "INSERT INTO `role`(`role_name`) VALUES (:userRole)";
            //     $userAddPrepare = $connect->prepare($userAddQuery);
            //     $userAddPrepare->bindParam(':userRole', $userRole, PDO::PARAM_STR);

            //     if ($userAddPrepare->execute()) {
            //         echo "<script>alert('User Role Added Successfully')</script>";
            //     }
            // }


            if (isset($_POST['addUserPermission'])) {

                $permissions = $_POST['permissions'];
                $roleId = $_POST['userRole'];

               foreach($permissions as $permissionId)
               {

                $permissionRoleQuery = "INSERT INTO `permissionrole`(`role_id`, `permission_id`) VALUES (:roleId, :permissionId)";
                $permissionRolePrepare = $connect->prepare($permissionRoleQuery);
                $permissionRolePrepare->bindParam(':roleId',$roleId, PDO::PARAM_INT);
                $permissionRolePrepare->bindParam(':permissionId',$permissionId, PDO::PARAM_INT);
                $permissionRolePrepare->execute();
               }
            }







            ?>




            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add User Permission</h4>
                                    <p class="card-description">
                                        Add User Permission
                                    </p>
                                    <form class="forms-sample" method="post">
                                        <div class="form-group">
                                            <label for="exampleInputName1">User Role</label>
                                            <select name="userRole" id="" class="form-control">
                                                <option value="" selected disabled>Select user role...</option>

                                                <?php foreach ($userRoleData as $userRole) { ?>
                                                    <option value="<?= $userRole['role_id'] ?>"><?= $userRole['role_name'] ?></option>
                                                <?php } ?>



                                            </select>
                                        </div>
                                        <div class="form-group">

                                        <?php foreach($userPermissionData as $userPData){ ?>

                                             <input type="checkbox" name="permissions[]" value="<?= $userPData['permissions_id']?>"> <?= $userPData['permission_name']?> <br>
                                             
                                            <?php } ?>
                                        </div>




                                        <button type="submit" class="btn btn-primary mr-2" name="addUserPermission">Add User Permission</button>
                                    </form>
                                </div>
                            </div>
                        </div>






                        <?php require "../partials/_footer.php" ?>

                    </div>
                </div>
            </div>