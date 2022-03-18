<?php
include 'all.php';
?>


<!-- Modal -->
<div class="modal fade" id="ajout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div>
  <div class="row mt-4">
    <div class="col-md d-flex justify-content-between ms-2">
      <div class="">
        <h3>Students List</h3>
      </div>
    
    </div>
  </div>
  <hr>
  <form action="addstudents.php" method="POST" class="container bg-white " style="max-width: 475px">
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
        <div class="opacity-50">  
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your Name">
        </div>  
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <div class="opacity-50">
            <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Entrer your email">
          </div>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <div class="opacity-50">
            <input type="number_format" name="phone" class="form-control" id="exampleInputPassword1" placeholder="Enter your phone">
          </div>
        </div>
        <div class="mb-3">
          <label for="enroll_number" class="form-label">Enroll Number</label>
          <div class="opacity-50">
            <input type="number_format" name="enroll_number" class="form-control" id="exampleInputPassword1" placeholder="Enter your enroll number">
          </div>
        </div>
        <div class="mb-3">
          <label for="date_of_admission" class="form-label">Date of Admission</label>
          <div class="opacity-50">
            <input type="date" name="date_of_admission" class="form-control" id="exampleInputPassword1" placeholder="Enter your date of admission">
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
<div>
  <div class="row mt-4">
    <div class="col-md d-flex justify-content-between ms-2">
      <div class="">
        <h3>Students List</h3>
      </div>
      <div class="me-3">
        <img class="" src="images/scroll.svg" alt="">
        <a href="#"><button class="btn btn-info text-white " data-toggle="modal" data-target="#ajout">ADD NEW STUDENT</button></a> 
      </div>
    </div>
  </div>
  <hr>
  <div class="conatiner-fluid mx-auto" >
    <div class="row mx-2" style="overflow-x: auto;">
      <table>
        <thead style="color: rgba(78, 73, 73, 0.211); " class="bg-light">
          <tr>
            <th scope="col"></th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone </th>
            <th scope="col">Enroll Number</th>
            <th class="text-nowrap" scope="col">Date of admission</th>
            <th scope="col"> </th>
          </tr>
        
          

        </thead>
        <tbody>
        <?php
            $conn = new mysqli('localhost', 'root','', 'e_classe_db');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT id, name, email, phone, enroll_number, date_of_admission from students order by id DESC;";
            $result = $conn->query($sql);
            if ($result-> num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                      <td> <img src="images/table.svg" alt=></td>
                      <td>' . $row["name"] . '</td>
                      <td>' . $row["email"] . '</td>
                      <td>' . $row["phone"] . '</td>
                      <td class="text-nowrap">' . $row["enroll_number"] . '</td>
                      <td class="text-nowrap">' . $row["date_of_admission"] . '</td>
                      
                      <td class="text-nowrap"><a href="edit.php?edit='.$row["id"].'" class="bi bi-pencil text-info mx-4"></a></td>

                      <td class="text-nowrap"><a href="deletestudent.php?delete='.$row["id"].'" class="bi bi-trash text-info"></a></td>
                  </tr>';
                }
            }else {
                echo "0 results";
            }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>