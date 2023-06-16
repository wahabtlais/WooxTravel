<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
if (!isset($_SESSION['admin_name'])) {
  header("location: " . ADMIN_URL . "");
}
$cities = $conn->query("SELECT * FROM cities");
$cities->execute();

$allCities = $cities->fetchAll(PDO::FETCH_OBJ);

?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Cities</h5>
                <a href="<?= ADMIN_URL ?>cities-admins/create-cities.php"
                    class="btn btn-primary mb-4 text-center float-right">Add City</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Trip Days</th>
                            <th scope="col">Price</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allCities as $city) : ?>
                        <tr>
                            <th scope="row"><?= $city->id ?></th>
                            <td><?= $city->name ?></td>
                            <td><img src="<?= ADMIN_URL ?>cities-admins/city-images/<?= $city->image ?>"
                                    style="width: 50px; height: 50px;"></td>
                            <td><?= $city->trip_days ?></td>
                            <td>$<?= $city->price ?></td>
                            <td><a href="<?= ADMIN_URL ?>cities-admins/delete-city.php?id=<?= $city->id ?>"
                                    class="btn btn-danger  text-center ">Delete</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require "../layouts/footer.php"; ?>