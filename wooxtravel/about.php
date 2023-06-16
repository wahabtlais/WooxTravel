<?php require "includes/header.php" ?>
<?php require "config/config.php" ?>

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $country = $conn->query("SELECT * FROM countries WHERE id=$id");
    $country->execute();

    $singleCountry = $country->fetch(PDO::FETCH_OBJ);

    //fetch cities
    $cities = $conn->query("SELECT * FROM cities WHERE country_id=$id");
    $cities->execute();

    $singleCity = $cities->fetchAll(PDO::FETCH_OBJ);


    //cities with bookings number
    $cities_query = $conn->query("SELECT cities.id AS id, cities.name AS name, cities.image AS image, cities.trip_days AS trip_days, cities.price AS price, 
    COUNT(bookings.city_id) AS count_bookings FROM cities LEFT JOIN bookings ON cities.id = bookings.city_id WHERE cities.country_id=$id GROUP BY(bookings.city_id)");

    $cities_query->execute();

    $allCities = $cities_query->fetchAll(PDO::FETCH_OBJ);

    //cities of every country
    $cities_country = $conn->query("SELECT COUNT(country_id) AS num_city FROM cities WHERE country_id=$id");

    $cities_country->execute();

    $num_of_cities = $cities_country->fetch(PDO::FETCH_OBJ);

    //number of bookings for every country
    $num_of_book_country = $conn->query("SELECT COUNT(bookings.city_id) AS count_bookings 
    FROM cities JOIN bookings ON cities.id = bookings.city_id WHERE cities.country_id=$id");

    $num_of_book_country->execute();

    $num_bookings = $num_of_book_country->fetch(PDO::FETCH_OBJ);
} else {
    header('location: 404.php');
}

?>


<!-- ***** Main Banner Area Start ***** -->
<div class="about-main-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content">
                    <div class="blur-bg"></div>
                    <h4>EXPLORE OUR COUNTRY</h4>
                    <div class="line-dec"></div>
                    <h2>Welcome To <?= $singleCountry->name; ?></h2>
                    <p><?= $singleCountry->description; ?></p>
                    <div class="main-button">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<div class="cities-town">
    <div class="container">
        <div class="row">
            <div class="slider-content">
                <div class="row">
                    <div class="col-lg-12">
                        <h2><?= $singleCountry->name; ?>’s <em>Cities &amp; Towns</em></h2>
                    </div>
                    <div class="col-lg-12">
                        <div class="owl-cites-town owl-carousel">
                            <?php foreach ($singleCity as $city) : ?>
                            <div class="item">
                                <div class="thumb">
                                    <img src="<?= CITY_IMG_URL ?><?= $city->image; ?>" alt="">
                                    <h4><?= $city->name; ?></h4>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="weekly-offers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading text-center">
                    <h2>Best Weekly Offers In Each City</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-weekly-offers owl-carousel">
                    <?php foreach ($allCities as $city) : ?>
                    <div class="item">
                        <div class="thumb">
                            <img src="<?= CITY_IMG_URL ?><?= $city->image; ?>" alt="">
                            <div class="text">
                                <h4><?= $city->name; ?><br><span><i class="fa fa-users"></i>
                                        <?= $city->count_bookings; ?> Check Ins</span></h4>
                                <h6>$<?= $city->price; ?><br><span>/person</span></h6>
                                <div class="line-dec"></div>
                                <ul>
                                    <li>Deal Includes:</li>
                                    <li><i class="fa fa-taxi"></i> <?= $city->trip_days; ?> Days Trip > Hotel Included
                                    </li>
                                    <li><i class="fa fa-plane"></i> Airplane Bill Included</li>
                                    <li><i class="fa fa-building"></i> Daily Places Visit</li>
                                </ul>
                                <?php if (isset($_SESSION['username'])) : ?>
                                <div class="main-button">
                                    <a href="reservation.php?id=<?= $city->id; ?>">Make a Reservation</a>
                                </div>
                                <?php else : ?>
                                <p>Login to make a reservation</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="more-about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="left-image">
                    <img src="assets/images/about-left-image.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Discover More About Our Country</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore.</p>
                </div>
                <div class="row">

                    <div class="col-lg-12">
                        <div class="info-item">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4><?= $num_of_cities->num_city; ?></h4>
                                    <span>Amazing Places</span>
                                </div>
                                <div class="col-lg-6">
                                    <h4><?= $num_bookings->count_bookings ?></h4>
                                    <span>Different Check-ins</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.
                </p>

            </div>
        </div>
    </div>
</div>


<?php require "includes/footer.php" ?>