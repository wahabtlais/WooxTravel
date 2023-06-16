<?php
require "../includes/header.php";
require "../config/config.php";
?>
<?php
if (isset($_SESSION['username'])) {
  header("location: " . ROOT_URL . "");
}
//Take the data from inputs
if (isset($_POST['submit'])) {
  if (empty($_POST['email']) or empty($_POST['password'])) {
    echo "<script>alert('Some inputs are empty');</script>";
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Check for the email
    $query = $conn->query("SELECT * FROM users where email='$email'");
    $query->execute();

    $fetch = $query->fetch(PDO::FETCH_ASSOC);

    if ($query->rowCount() > 0) {
      //Check for the password
      if (password_verify($password, $fetch['mypassword'])) {
        $_SESSION['username'] = $fetch['username'];
        $_SESSION['user_id'] = $fetch['id'];

        header("location: " . ROOT_URL . "");
      } else {
        echo "<script>alert('Email or password are wrong');</script>";
      }
    } else {
      echo "<script>alert('Email or password are wrong');</script>";
    }
  }
}



?>


<div class="reservation-form">
  <div class="container">
    <div class="row">

      <div class="col-lg-12">
        <form id="reservation-form" name="gs" method="POST" role="search" action="login.php">
          <div class="row">
            <div class="col-lg-12">
              <h4>Login</h4>
            </div>
            <div class="col-md-12">
              <fieldset>
                <label for="email" class="form-label">Your Email</label>
                <input type="email" name="email" class="Name" placeholder="Enter your email" autocomplete="on" required>
              </fieldset>
            </div>


            <div class="col-md-12">
              <fieldset>
                <label for="password" class="form-label">Your Password</label>
                <input type="password" name="password" class="Name" placeholder="Enter your password" autocomplete="on" required>
              </fieldset>
            </div>
            <div class="col-lg-12">
              <fieldset>
                <button class="main-button" name="submit" type="submit">Login</button>
              </fieldset>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php require "../includes/footer.php"; ?>