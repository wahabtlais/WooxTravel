<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
if (!isset($_SESSION['admin_name'])) {
  header("location: " . ADMIN_URL . "");
}
$countries = $conn->query("SELECT * FROM countries");
$countries->execute();

$allCountries = $countries->fetchAll(PDO::FETCH_OBJ);

?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Countries</h5>
                <a href="<?= ADMIN_URL ?>countries-admins/create-country.php"
                    class="btn btn-primary mb-4 text-center float-right">Create Country</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Continent</th>
                            <th scope="col">Population</th>
                            <th scope="col">Territory</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allCountries as $country) : ?>
                        <tr>
                            <th scope="row"><?= $country->id ?></th>
                            <td><?= $country->name ?></td>
                            <td><?= $country->continent ?></td>
                            <td><?= $country->population ?></td>
                            <td><?= $country->territory ?></td>
                            <td><a href="<?= ADMIN_URL ?>countries-admins/delete-country.php?id=<?= $country->id ?>"
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