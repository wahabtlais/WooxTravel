<?php require "../includes/header.php" ?>
<?php require "../config/config.php" ?>
<?php

if (!isset($_SESSION['username'])) {
    header("location: " . ROOT_URL . "");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $user_bookings = $conn->query("SELECT * FROM bookings WHERE user_id=$id");
    $user_bookings->execute();

    $allBookings = $user_bookings->fetchAll(PDO::FETCH_OBJ);
} else {
    header("location: 404.php");
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table" style="margin-top: 100px; margin-bottom: 200px;">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Number of Guests</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Checkin Date</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Status</th>
                        <th scope="col">Payment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allBookings as $bookings) : ?>
                        <tr>
                            <td><?= $bookings->name; ?></td>
                            <td><?= $bookings->num_of_guests; ?></td>
                            <td><?= $bookings->phone_number; ?></td>
                            <td><?= $bookings->checkin_date; ?></td>
                            <td><?= $bookings->destination; ?></td>
                            <td><?= $bookings->status; ?></td>
                            <td>$<?= $bookings->payment; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require "../includes/footer.php" ?>