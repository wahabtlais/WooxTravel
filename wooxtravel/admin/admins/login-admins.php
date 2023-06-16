<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
if (isset($_SESSION['admin_name'])) {
  header("location: " . ADMIN_URL . "");
}
//Take the data from inputs
if (isset($_POST['submit'])) {
  if (empty($_POST['email']) or empty($_POST['password'])) {
    echo "<script>alert('Some inputs are empty');</script>";
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Check for the email
    $query = $conn->query("SELECT * FROM admins where email='$email'");
    $query->execute();

    $fetch = $query->fetch(PDO::FETCH_ASSOC);

    if ($query->rowCount() > 0) {
      //Check for the password
      if (password_verify($password, $fetch['mypassword'])) {
        $_SESSION['admin_name'] = $fetch['admin_name'];
        $_SESSION['user_id'] = $fetch['id'];

        header("location: " . ADMIN_URL . "");
      } else {
        echo "<script>alert('Email or password are wrong');</script>";
      }
    } else {
      echo "<script>alert('Email or password are wrong');</script>";
    }
  }
}



?>
<div class="row">
    <div class="col">
        <div class="card" style="margin-right: 210px">
            <div class="card-body">
                <h5 class="card-title mt-5">Login</h5>
                <form method="POST" class="p-auto" action="login-admins.php">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />

                    </div>


                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="form2Example2" placeholder="Password"
                            class="form-control" />

                    </div>



                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>


                </form>

            </div>
        </div>
        <?php require "../layouts/footer.php"; ?>