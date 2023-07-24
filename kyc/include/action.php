<?php
include("opendb.php");

$datereg = date("d-m-y , g:i a");
$yearreg = date("Y");
$alert = '';
$msg = '';
if (isset($_SESSION['user_id'])) {

    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `usertransactiondetails`  WHERE `user_id`='$user_id'";
    $result = mysqli_query($conn, $sql);
    $fetch = mysqli_fetch_assoc($result);

}



// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $imageData = $_POST['image'];
//     echo $imageData;
//     // $decodedImageData = base64_decode(str_replace('data:image/jpeg;base64,', '', $imageData));

//     // $imageName = 'captured_image_' . time() . '.jpeg'; // Generate a unique image name
//     // $imagePath = 'userPhoto/' . $imageName; // Set the path to your folder
//     // file_put_contents($imagePath, $decodedImageData);

//     // Perform database operations here to store image information (e.g., image path, timestamp, user information) in your database.
//     // Move the uploaded photo to the target directory
//     // if (move_uploaded_file($_FILES['image']['tmp_name'], 'userPhoto/' .$decodedImageData)) {
//     //     $sql = "UPDATE `kyc` SET `userPhoto`='$decodedImageData' WHERE `user_id`='$user_id'";

//     //     $result = mysqli_query($conn, $sql);
//     //     if ($result) {
//     //         $_SESSION['user_id'] = $user_id;
//     //         // header('location: showdetails.php');
//     //         $alert = 'success';
//     //         $msg = 'Photo uploaded successfully.';
//     //     }
//     // } else {
//     //     $alert = 'danger';
//     //     $msg = 'Failed to upload photo.';
//     // }
//     // Respond with a success message or appropriate response to the client.
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imageData = $_POST['image'];
    $decodedImageData = base64_decode(str_replace('data:image/jpeg;base64,', '', $imageData));
  
    $imageName = 'captured_image_' . time() . '.jpeg'; // Generate a unique image name
    $imagePath = '../userPhoto/' . $imageName; // Set the path to your folder
    if (file_put_contents($imagePath, $decodedImageData)) {
        $sql = "UPDATE `kyc` SET `userPhoto`='$imageName' WHERE `user_id`='$user_id'";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['user_id'] = $user_id;
            // header('location: showdetails.php');
            // $alert = 'success';
            echo 'Photo uploaded successfully.';
        }
    } else {
        // $alert = 'danger';
        echo 'Failed to upload photo.';
    }
  
    // Perform database operations here to store image information (e.g., image path, timestamp, user information) in your database.
  
    // Respond with a success message or appropriate response to the client.
  }


?>
