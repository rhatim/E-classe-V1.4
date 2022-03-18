<?php
include 'all.php'
?>
<div>
  <div class="row mt-4">
    <div class="col-md d-flex justify-content-between ms-2">
      <div class="">
        <h3>Students List</h3>
      </div>
      <div class="me-3">
        <img class="" src="images/scroll.svg" alt="">
        <a href="formstudents.php"><button class="btn btn-info text-white ">ADD NEW STUDENT</button></a> 
      </div>
    </div>
  </div>
  <hr>
  <?php
                $conn = new mysqli('localhost', 'root','', 'e_classe_db');
                $id = $_GET['edit'];
                $sql = "SELECT * FROM students WHERE id = $id";
                $res = mysqli_query($conn , $sql);
                $updat = mysqli_fetch_assoc($res);
            ?>
  <form method="POST" class="container bg-white " style="max-width: 475px">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
        <div class="opacity-50">  
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $updat['name'];?>">
        </div>  
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <div class="opacity-50">
            <input type="email" name="email" class="form-control" id="exampleInputPassword1" value="<?php echo $updat['email'];?>">
          </div>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <div class="opacity-50">
            <input type="number_format" name="phone" class="form-control" id="exampleInputPassword1" value="<?php echo $updat['phone'];?>">
          </div>
        </div>
        <div class="mb-3">
          <label for="enroll_number" class="form-label">Enroll Number</label>
          <div class="opacity-50">
            <input type="number_format" name="enroll_number" class="form-control" id="exampleInputPassword1" value="<?php echo $updat['enroll_number'];?>">
          </div>
        </div>
        <div class="mb-3">
          <label for="date_of_admission" class="form-label">Date of Admission</label>
          <div class="opacity-50">
            <input type="date" name="date_of_admission" class="form-control" id="exampleInputPassword1" value="<?php echo $updat['date_of_admission'];?>">
          </div>
        </div>
        <div class="d-grid pt-5">
            <button type="submit" name="submit" class="btn btn-info text-white shadow-lg mb-3  rounded">SUBMIT</button>
        </div>
        <?php
                if(isset($_POST['submit'])){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $enroll_number= $_POST['enroll_number'];
                    $date_of_admission = $_POST['date_of_admission'];
                    $query = "UPDATE students set id = $id , name='$name',email='$email',phone='$phone',enroll_number='$enroll_number',date_of_admission='$date_of_admission' where id='$id'";
                    $res=mysqli_query($conn,$query);
                    echo '<script>window.location.href = "students.php";</script>';
                    mysqli_close($conn,$query);
                }
            ?>
        
      </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>