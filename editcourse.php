<?php
include 'all.php'
?>
<?php
$conn = new mysqli('localhost', 'root', '', 'e_classe_db');
$id = $_GET['edit'];
$comsql = "SELECT * FROM (course) WHERE id=$id";
$sql=mysqli_query($conn,$comsql);
$result= mysqli_fetch_assoc($sql);
?>
<div>
  <div class="row mt-4">
    <div class="col-md d-flex justify-content-between ms-2">
      <div class="">
        <h3>Course Form</h3>
      </div>
      <div class="me-3">
        <img class="" src="images/scroll.svg" alt="">
        <a href="courseform.php"><button class="btn btn-info text-white ">ADD NEW COURSE</button></a>
      </div>
    </div>
  </div>
  <hr>
  <form method="POST" class="container bg-white " style="max-width: 475px">
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <div class="opacity-50">
        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['title']; ?>">
      </div>
      <label for="teacher" class="form-label">Teacher</label>
      <div class="opacity-50">
        <input type="text" name="teacher" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['teacher']; ?>">
      </div>
      <label for="period" class="form-label">Period</label>
      <div class="opacity-50">
        <input type="text" name="period" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $result['period']; ?>">
      </div>
    </div>
    <div class="d-grid pt-5">
      <button type="submit" name="submit" class="btn btn-info text-white shadow-lg mb-3  rounded">SUBMIT</button>
    </div>

    <?php
    if (isset($_POST['submit'])) {
      $title = $_POST['title'];
      $teacher = $_POST['teacher'];
      $period = $_POST['period'];
      $sql= "UPDATE course SET title='$title',teacher='$teacher',period='$period' WHERE id='$id' ";
      mysqli_query($conn,$sql);
      echo '<script>window.location.href = "course.php";</script>';
      mysqli_close($conn, $sql);
    }
    ?>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>