<?php require "../includes/header.php" ?>
<?php require "../config/config.php" ?>

<?php

if (isset($_SESSION['username'])) {
    header("location: " . ROOT_URL . "");
}

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) or empty($_POST['email']) or empty($_POST['password'])) {
        echo "<script>alert('Some inputs are empty');</script>";
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $insert = $conn->prepare("INSERT INTO users (username,email, mypassword) VALUES (:username, :email, :mypassword)");
        $insert->execute([
            ":username" => $username,
            ":email" => $email,
            ":mypassword" => $password
        ]);

        header('location: login.php');
    }
}

?>



<div class="reservation-form">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">
                <form id="reservation-form" name="gs" method="POST" role="search" action="register.php">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4>Register</h4>
                        </div>
                        <div class="col-md-12">
                            <fieldset>
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="username" placeholder="Enter your username" autocomplete="on" required>
                            </fieldset>
                        </div>

                        <div class="col-md-12">
                            <fieldset>
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email" name="email" class="email" placeholder="Enter your email" autocomplete="on" required>
                            </fieldset>
                        </div>

                        <div class="col-md-12">
                            <fieldset>
                                <label for="password" class="form-label">Your Password</label>
                                <input type="password" name="password" class="password" placeholder="Enter your password" autocomplete="on" required>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset>
                                <button class="main-button" name="submit" type="submit">Register</button>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require "../includes/footer.php" ?>