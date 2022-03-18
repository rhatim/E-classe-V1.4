<?php
$conn = new mysqli('localhost', 'root', '', 'e_classe_db');
if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password =  hash('ripemd160', $password);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } else {
    $data = "SELECT * FROM comptes WHERE email = '" . $email . "' AND password = '" . $password . "' limit 1";
    $link = mysqli_query($conn, $data);
    $row = mysqli_num_rows($link);
    $namedb = mysqli_fetch_assoc($link);
    if ($row > 0) {
      session_start();
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['name'] = $namedb['name'];
      $_SESSION['login_time'] = time();
      if (!empty($_POST["remember_me"])) {
        setcookie("email", $_POST["email"], time() + (100));
        setcookie("password", $_POST["password"], time() + (100));
      } else {
        if (isset($_COOKIE["email"])) {
          setcookie("email", "");
        }
        if (isset($_COOKIE["password"])) {
          setcookie("password", "");
        }
      }
      header("location:p2.php");
    } else {
      header("location:index.php?error=Email or Password is incorrect!");
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <form method="POST" class="container bg-white h-auto" style="max-width: 475px">
    <h1 class="pt-4 ms-4"><span class="text-info">|</span> E-classe</h1>
    <h2 class="pt-3 text-center">SIGN IN</h2>
    <div class="opacity-75">
      <p class="pt-3 text-center">Entrer your credentials to access your account</p>
    </div>
    <?php if (isset($_GET['error'])) { ?>
      <p class="text-dark border border-2 border-danger pt-1 pb-2 text-center bg-warning bar"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <div class="opacity-50">
        <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Entrer your email" value="<?php if (isset($_COOKIE["email"])) echo $_COOKIE["email"] ?>">
      </div>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <div class="opacity-50">
        <input type="password" name="password" class="form-control" placeholder="Entrer your password" value="<?php if (isset($_COOKIE["password"])) echo $_COOKIE["password"] ?>">
      </div>
    </div>
    <div class="m-0">
      <input name="remember_me" type="checkbox">
      <label for="remember_me" class="form-label">Remember me</label>
    </div>
    <div class="d-grid">
      <button type="submit" name="submit" class="btn btn-info text-white">LOGIN</button>
    </div>
    
    <p class="text-center mt-3">Forgot your password?<span> <a class="text-info" href="index.php">SIN UP</a> </span> </p>
    
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>