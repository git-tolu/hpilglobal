<?php
include('includes/aunthenticate.php');
$page = "Dashboard";
$home = "Transaction";
$apptitle = "Transaction System";
$todaydate = date("jS F, Y");

// active membership
// $sql8 = "SELECT * FROM membership WHERE status='active'";		   
// $sql8 = "SELECT * FROM subscribers";
// $result8 = mysqli_query($conn, $sql8);
// if (mysqli_num_rows($result8) > 0) {
//     $activemembers = number_format(mysqli_num_rows($result8));
//     $result8Fetch['amountpayable'] = 0;
//     while ($result8Fetch = mysqli_fetch_assoc($result8)) {
//         $result8Fetch['amountpayable'] = $result8Fetch['amountpayable'] + $result8Fetch['amountpayable'];
//         $amountpayable = number_format($result8Fetch['amountpayable'], 2);
//         $sql9 = "SELECT * FROM payments ";
//         $result9 = mysqli_query($conn, $sql9);
//         $result9Fetch['amountpaid'] = 0;

//         while ($result9Fetch = mysqli_fetch_assoc($result9)) {
//             $result9Fetch['amountpaid'] = $result9Fetch['amountpaid'] + $result9Fetch['amountpaid'];
//             // $amountowing = number_format($result9Fetch['amountpaid'], 2);

//             $amountowing = $result8Fetch['amountpayable'] - $result9Fetch['amountpaid'];
//             # code...
//         }
        
//     }
// } else {
//     $activemembers = 0;
//     $amountpayable = 0;
// }
$amountowing =0;
$activemembers = 0;
$amountpayable = 0;
//inactive members

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php
include("includes/pagehead.php");
?>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <?php
    // include("includes/preloader.php");
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
                    <!-- column -->
                    <div class="col-sm-12 col-lg-4">
                        <div style="background-color:#000 !important;" class="card card-hover">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="m-r-10">
                                        <span><a style="color:#fff !important;"
                                                href='fullmembers.php'>Subscribers</a></span>
                                        <h4><a style="color:#fff !important;" href='fullmembers.php'>
                                                <?php echo $activemembers; ?>
                                            </a></h4>
                                    </div>
                                    <div class="ml-auto">
                                        <a href='fullmembers.php'> <img src="assets/images/active.png" width="50%"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <div class="col-sm-12 col-lg-4">
                        <div style="background-color:#ffbc34 !important;" class="card card-hover">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="m-r-10">
                                        <span><a style="color:#fff !important;" href='pendingmembers.php'>Amount
                                                Expected</a></span>
                                        <h4 style="color:#fff !important;"><a style="color:#fff !important;"
                                                href='pendingmembers.php'>
                                                <?php echo $amountpayable; ?>
                                            </a></h4>
                                    </div>
                                    <div class="ml-auto">
                                        <a href='pendingmembers.php'><img src="assets/images/pending.png"
                                                width="50%"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                    <div class="col-sm-12 col-lg-4">
                        <div style="background-color:#000 !important;" class="card card-hover">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="m-r-10">
                                        <span><a style="color:#fff !important;" href='owingmembers.php'>Amount Owing
                                            </a></span>
                                        <h4><a style="color:#fff !important;" href='owingmembers.php'>
                                                <?php echo $amountowing; ?>
                                            </a></h4>
                                    </div>
                                    <div class="ml-auto">
                                        <a href='owingmembers.php'> <img src="assets/images/owing.png" width="50%"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales Summery -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Recent Applications </h4>
                                        <h5 class="card-subtitle">Overview of Last Ten Recent Applications </h5>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="dl">
                                            <div class="button-group">
                                                <a href="pendingmembers.php"><button type="button"
                                                        class="btn waves-effect waves-light btn-outline-primary">+ View
                                                        All</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- title -->
                            </div>
                            <div class="table-responsive">
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-light">
                                            <th class="border-top-0 text-capitalize">full name</th>
                                            <th class="border-top-0 text-capitalize">nationality</th>

                                            <th class="border-top-0 text-capitalize">email address</th>
                                            <th class="border-top-0 text-capitalize">occupation</th>
                                            <th class="border-top-0 text-capitalize">amount payable</th>
                                            <th class="border-top-0 text-capitalize">Phone No.</th>
                                            <th class="border-top-0 text-capitalize"> Date Registered</th>
                                            <th class="border-top-0 text-capitalize"> Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        // $sql8 = "SELECT * FROM subscribers  ORDER BY id DESC LIMIT 10";

                                        // $result8 = mysqli_query($conn, $sql8);
                                        // if (mysqli_num_rows($result8) > 0) {
                                        //     $column_num = 1;
                                        //     while ($info8 = mysqli_fetch_array($result8)) {
                                        //         $user = $info8['regid'];

                                        //         $mid = $info8['id'];
                                        //         $surname = $info8['surname'];
                                        //         $firstname = $info8['firstname'];
                                        //         $nationality = $info8['nationality'];
                                        //         $emailaddress = $info8['emailaddress'];
                                        //         $occupation = $info8['occupation'];
                                        //         $amountpayable = $info8['amountpayable'];
                                        //         $mobileno = $info8['mobileno'];
                                        //         $datereg = $info8['datereg'];
                                        //         // $phone = $info8['phone'];
                                        //         // $rcno = $info8['rcno'];
                                        //         // $orgfunctions = $info8['orgfunctions'];
                                        //         // $memberstatus = $info8['status'];
                                        //         // $approvaladmin = $info8['approvaladmin'];
                                        //         // $completeregpay = $info8['completeregpay'];
                                        
                                        //         // if ($approvaladmin == "Approved") {
                                        //         //     $approval = "";
                                        //         //     $approvalemail = "<a class='dropdown-item' href='resendapproval.php?id=$mid''>Resend Approval Email </a>";
                                        
                                        //         // } else {
                                        //         //     $approval = "<a class='dropdown-item' href='approvemembers.php?id=$mid&newstatus=Approved'>Approve Application </a>";
                                        //         //     $approvalemail = "";
                                        //         // }
                                        
                                        //         // if ($approvaladmin == "Declined") {
                                        //         //     $decline = "";
                                        //         // } else {
                                        //         //     $decline = "<a class='dropdown-item' href='approvemembers.php?id=$mid&newstatus=Declined'>Decline Application</a>";
                                        //         // }
                                        

                                        //         echo "
                                        // <tr>
                                        //     <td>
                                        //         <div class='d-flex align-items-center'>
                                        //             <div class='m-r-10'><a class='btn btn-circle btn-info text-white'><img src='assets/images/small.png' width='70%'></a></div>
                                        //             <div class=''>
                                        //                 <h4 class='m-b-0 font-16'>$surname $firstname</h4>
                                        //             </div>
                                        //         </div>
                                        //     </td>
                                        //     <td>$nationality</td>
                                        //     <td>$emailaddress</td>
                                        //     <td>$occupation</td>
                                        //     <td><label class='label label-danger'>$amountpayable</label></td>
                                        //     <td>$mobileno</td>
                                        //     <td>
                                        //         <h5 class='m-b-0'>$datereg</h5>
                                        //     </td>
                                        //     <td>
                                        //     <a href='regdetailsdup.php?id=$user'target='_blank' class='btn btn-primary'>Registration Details</a>
                                        // </td>
											
                                        // </tr>";
                                        //     }
                                        // }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
</body>

</html>