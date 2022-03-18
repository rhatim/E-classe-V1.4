<?php
include 'all.php';
?>


<!-- Modal -->
<div class="modal fade" id="ajout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div>
  <div class="row mt-4">
    <div class="col-md d-flex justify-content-between ms-2">
      <div class="">
        <h3>Course Form</h3>
      </div>
     
    </div>
  </div>
  <hr>
  <form action="addcourse.php" method="POST" class="container bg-white " style="max-width: 475px">
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
        <div class="opacity-50">  
            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the title of the course">
        </div>
        <label for="teacher" class="form-label">Teacher</label>
        <div class="opacity-50">  
            <input type="text" name="teacher" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the teacher of the course">
        </div>  
        <label for="period" class="form-label">Period</label>
        <div class="opacity-50">  
            <input type="text" name="period" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the period of the course">
        </div>    
        </div>
        <div class="d-grid pt-5">
            <button type="submit" class="btn btn-info text-white shadow-lg mb-3  rounded">SUBMIT</button>
        </div>
        
      </form>
</div>
      </div>
    
    </div>
  </div>
</div>
<div class="row mt-4">
    <div class="col-md d-flex justify-content-between ms-2">
        <div class="">
            <h3>Course List</h3>
        </div>
        <div class="me-3">
            <img class="" src="images/scroll.svg" alt="">
            <a href="#"><button class="btn btn-info text-white " data-toggle="modal" data-target="#ajout">ADD NEW COURSE</button></a>
        </div>
    </div>
</div>
<hr>
<div class="conatiner-fluid mx-auto" style="">
    <div class="row mx-2" style="overflow-x: auto;">
        <table>
            <thead style="color: rgba(78, 73, 73, 0.211); " class="bg-light">
                <tr>
                    <th scope="col-4">Title</th>
                    <th scope="col-3">Teacher</th>
                    <th scope="col-3">Period</th>
                    <th scope="col-1"> </th>
                    <th scope="col-1"> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = new mysqli('localhost', 'root', '', 'e_classe_db');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * from course order by id DESC;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>
                      <td>' . $row["title"] . '</td>
                      <td>' . $row["teacher"] . '</td>
                      <td>' . $row["period"] . '</td>
                      <td class="text-nowrap"><a href="editcourse.php?edit=' . $row["id"] . '" class="bi bi-pencil text-info mx-4"></a></td>
                      <td class="text-nowrap"><a href="deletecourse.php?delete=' . $row["id"] . '" class="bi bi-trash text-info"></a></td>
                  </tr>';
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>