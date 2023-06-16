<?php require '../../config/config.php'; ?>
<?php
if (!isset($_SESSION['admin_name'])) {
    header("location: " . ADMIN_URL . "");
}

if (isset($_GET['id']) and isset($_GET['status'])) {
    $id = $_GET['id'];
    $status = $_GET['status'];

    if ($status == "Pending") {
        $update = $conn->prepare("UPDATE bookings SET status = 'Booked Successfully' WHERE id=$id");
        $update->execute();

        header("location: show-bookings.php");
    } else {
        $update = $conn->prepare("UPDATE bookings SET status = 'Pending' WHERE id=$id");
        $update->execute();

        header("location: show-bookings.php");
    }
}