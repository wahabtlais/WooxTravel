<?php require "../../config/config.php";
if (!isset($_SESSION['admin_name'])) {
    header("location: " . ADMIN_URL . "");
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete_image = $conn->query("SELECT * FROM countries WHERE id=$id");
    $delete_image->execute();

    $getImage = $delete_image->fetch(PDO::FETCH_OBJ);

    unlink("images-countries/" . $getImage->image);

    //delete the record
    $delete_record = $conn->query("DELETE FROM countries WHERE id=$id");
    $delete_record->execute();

    header("location: show-country.php");
}