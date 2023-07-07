<?php
include('includes/aunthenticate.php');
$page = "Exchange rate";
$home = "Transaction";
$apptitle = "Transaction System";
$todaydate = date("jS F, Y");
$alert = '';
$msg = '';

    $sql = "SELECT * FROM `exchangerate`";
    $result = mysqli_query($conn, $sql);
    $fetch = mysqli_fetch_assoc($result);

if (isset($_POST['exchangeBTN'])) {
    # code...
    $nairatocad = $_POST['nairatocad'];
    $cadtonaira = $_POST['cadtonaira'];

    if (!empty($nairatocad && $cadtonaira)) {
        # code...
        $sql = "UPDATE `exchangerate` SET `nairatocad`='$nairatocad',`cadtonaira`='$cadtonaira' WHERE `id`='1'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $alert = 'success';
            $msg = 'Data Submitted Successfully';
            // header('location: showdetails.php');
        }
    }

}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
include("includes/pagehead.php");
?>
<!-- This page plugin CSS -->
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <?php
    include("includes/preloader.php");
    ?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php
        include("includes/topheader.php");
        ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php
        include("includes/leftsidebar.php");
        ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <?php
            include("includes/breadcrumb.php");
            ?>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Summery -->
                <!-- ============================================================== -->
                <div class="row "
                    style="display: flex; justify-content:center; align-items: center; text-align:center;">

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h4 class="card-title text-white">Exchange rate</h4>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center text-center text-danger">
                                    <div class="alert alert-<?= $alert ?>">
                                        <?= $msg ?>
                                    </div>
                                </div>
                                <form class="row " action="" method="post">
                                    <div class="col-md-12 mb-3">
                                        <label for="nairatocad" class="form-label">Naira To CAD</label>
                                        <input type="text" class="form-control" id="nairatocad" name="nairatocad"
                                            placeholder="Naira To CAD" value="<?= $fetch['nairatocad']  ?>"  required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="cadtonaira" class="form-label">CAD TO Naira</label>
                                        <input type="text" class="form-control" id="cadtonaira" name="cadtonaira"
                                            placeholder="CAD TO Naira" value="<?= $fetch['cadtonaira']  ?>"  required>
                                    </div>

                                    <div class="col-md-12 m-3">
                                        </div>
                                        <button class="btn btn-block btn-lg btn-info" style="background: black; color: white;"  type="submit"
                                            name="exchangeBTN">Update Exchange rate</button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php
            include("includes/footer.php");
            ?> <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->


    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php
    include("includes/pagescript.php");
    ?>

    <!--This page plugins -->
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="dist/js/pages/datatable/datatable-advanced.init.js"></script>


</body>

</html>