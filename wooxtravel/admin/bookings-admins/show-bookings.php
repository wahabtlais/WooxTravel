<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

if (!isset($_SESSION['admin_name'])) {
  header("location: " . ADMIN_URL . "");
}

$bookings = $conn->query("SELECT * FROM bookings");
$bookings->execute();

$allBookings = $bookings->fetchAll(PDO::FETCH_OBJ);

?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Bookings</h5>

                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Num of Guests</th>
                            <th scope="col">Checkin Date</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allBookings as $booking) : ?>
                        <tr>
                            <th scope="row"><?= $booking->id ?></th>
                            <td><?= $booking->name ?></td>
                            <td><?= $booking->phone_number ?></td>
                            <td><?= $booking->num_of_guests ?></td>
                            <td><?= $booking->checkin_date ?></td>
                            <td><?= $booking->destination ?></td>
                            <td>$<?= $booking->payment ?></td>
                            <?php if ($booking->status == "Pending") : ?>
                            <td><a href="<?= ADMIN_URL ?>bookings-admins/status.php?id=<?= $booking->id ?>&status=<?= $booking->status; ?>"
                                    class="btn btn-danger  text-center ">Pending</a></td>
                            <?php else : ?>
                            <td><a href="<?= ADMIN_URL ?>bookings-admins/status.php?id=<?= $booking->id ?>&status=<?= $booking->status; ?>"
                                    class="btn btn-success  text-center ">Booked Successfully</a></td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php require "../layouts/footer.php"; ?>