<?php
include('includes/aunthenticate.php');
$page = "Dashboard";
$home = "Transaction";
$apptitle = "Transaction System";
$todaydate = date("jS F, Y");
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
                <div class="row">

                    <div class="col-sm-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">User Transaction Details</h4>
                                <?php if (isset($msg)) {
                                    echo $msg;
                                } ?>
                                <div class="">
                                    <div class="table-responsive">
                                        <table id="file_export" class="table table-striped table-bordered display">
                                            <thead>
                                                <tr>
                                                    <th>firstname</th>

                                                    <th>lastname</th>
                                                    <th>email</th>
                                                    <th>address</th>
                                                    <th>zipcode</th>
                                                    <th>currency</th>
                                                    <th>amount</th>
                                                    <th>reason</th>
                                                    <th>recipients</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                if(!isset($_GET['id'])){
                                                    header("location: dashboard.php");
                                                }
                                                $id = $_GET['id'];

                                                $sql8 = "SELECT * FROM usertransactiondetails WHERE user_id='$id'  ORDER BY id DESC";

                                                $result8 = mysqli_query($conn, $sql8);
                                                if (mysqli_num_rows($result8) > 0) {
                                                    $column_num = 1;
                                                    while ($info8 = mysqli_fetch_array($result8)) {
                                                        $mid = $info8['id'];
                                                        $firstname = $info8['firstname'];
                                                        $lastname = $info8['lastname'];
                                                        $email = $info8['email'];
                                                        $address = $info8['address'];
                                                        $zipcode = $info8['zipcode'];
                                                        $currency = $info8['currency'];
                                                        $amount = $info8['amount'];
                                                        $reason = $info8['reason'];
                                                        $recipients = $info8['recipients'];
                                                        echo " <tr>
                                                <td>$firstname</td>
                                                <td>$lastname </td>
                                                <td>$email </td>
                                                <td>$address </td>
                                                <td>$zipcode </td>
                                                <td>$currency </td>
                                                <td>$amount </td>
                                                <td>$reason </td>
                                                <td>$recipients </td>
                                                
                                            </tr>";
                                                    }
                                                }
                                                ?>


                                            </tbody>

                                        </table>
                                    </div>

                                </div>
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