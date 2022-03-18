
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
    <h2 class="pt-3 text-center">SIGN UP</h2>
    <div class="opacity-75">
      <p class="pt-3 text-center">Entrer your credentials to access your account</p>
    </div>
    <?php if (isset($_GET['error'])) { ?>
      <p class="text-dark border border-2 border-danger pt-1 pb-2 text-center bg-warning bar"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <div class="mb-3">
      <label for="email" class="form-label">Name</label>
      <div class="opacity-50">
        <input type="text" name="name" class="form-control" aria-describedby="emailHelp" placeholder="Entrer your name" value="<?php if (isset($_COOKIE["name"])) echo $_COOKIE["name"] ?>">
      </div>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Email</label>
      <div class="opacity-50">
        <input type="email" name="email" class="form-control" placeholder="Entrer your email" value="<?php if (isset($_COOKIE["email"])) echo $_COOKIE["email"] ?>">
      </div>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <div class="opacity-50">
        <input type="password" name="password" class="form-control" placeholder="Entrer your password" value="<?php if (isset($_COOKIE["password"])) echo $_COOKIE["password"] ?>">
      </div>
    </div><div class="mb-3">
      <label for="password" class="form-label">Confirm Password</label>
      <div class="opacity-50">
        <input type="password" name="confirmpassword" class="form-control" placeholder="Entrer your password" value="<?php if (isset($_COOKIE["confir mpassword"])) echo $_COOKIE["confirm password"] ?>">
      </div>
    </div>
    
    <div class="d-grid">
      <button type="submit" name="submit" class="btn btn-info text-white">SIGN UP</button>
    </div>
    <p class="text-center mt-3"><span> <a class="text-info" href="signin.php">SIGN IN</a> </span> </p>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>
<?php
$conn = new mysqli('localhost', 'root', '', 'e_classe_db');
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $sql="SELECT * FROM comptes where email='$email'";
    $q=mysqli_query($conn,$sql);
    if (mysqli_num_rows($q)==0) {
        if ($_POST['password']==$_POST['confirmpassword']) { 
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = hash('ripemd160', $password);
        $sql = "INSERT INTO comptes(name, email, password) VALUE ('$name', '$email', '$password')";
        $query = mysqli_query($conn,$sql);
        }else{ 
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'your confirmation inccorect!',
            })
            </script>";

        }
    }else // email deja existe
    echo "<script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'your email already exists!',
    })
    </script>";


}

?>
