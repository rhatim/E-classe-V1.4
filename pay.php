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
        <h3>Payment Form</h3>
      </div>

    </div>
  </div>
  <hr>
  <form action="addpayments.php" method="POST" class="container bg-white " style="max-width: 475px">
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <div class="opacity-50">
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the name">
      </div>
      <label for="payment_schedule" class="form-label">Payment Schedule</label>
      <div class="opacity-50">
        <input type="text" name="payment_schedule" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the payment schedule">
      </div>
      <label for="bill_number" class="form-label">Bill Number</label>
      <div class="opacity-50">
        <input type="number_format" name="bill_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the bill number">
      </div>
      <label for="amount_paid" class="form-label">Amount Paid</label>
      <div class="opacity-50">
        <input type="number_format" name="amount_paid" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the amount paid">
      </div>
      <label for="balance_amount" class="form-label">Balance Amount</label>
      <div class="opacity-50">
        <input type="number_format" name="balance_amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the balance amount">
      </div>
      <label for="date" class="form-label">Date</label>
      <div class="opacity-50">
        <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the date">
      </div>
    </div>
    <div class="d-grid pt-5">
      <button type="submit" name="submit" class="btn btn-info text-white shadow-lg mb-3  rounded">SUBMIT</button>
    </div>

  </form>
</div>
      </div>
    </div>
  </div>
</div>
<div class="mx-3">
  <div class="row mt-4">
    <div class="col-md d-flex justify-content-between">
      <div class="">
        <h3>Payment Details</h3>
      </div>
      <div class="">
        <img class="" src="images/scroll.svg" alt="">
        <a href="#"><button class="btn btn-info text-white " data-toggle="modal" data-target="#ajout">ADD NEW PAYMENT</button></a> 
      </div>
    </div>
  </div>
  <hr>
  <div style="overflow: auto;" class="row">
    <table class="table table-hover table-borderless table-striped px-2">
      <thead style="color: rgba(78, 73, 73, 0.211); " class="bg-light mx-1">
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Payment Schedule</th>
          <th scope="col">Bill Number</th>
          <th scope="col">Amount Paid</th>
          <th scope="col">Balance amountr</th>
          <th scope="col">Date</th>
          <th scope="col"> </th>
        </tr>
      </thead>
      <tbody>
      <?php
            $conn = new mysqli('localhost', 'root','', 'e_classe_db');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * from payments order by id DESC;";
            $result = $conn->query($sql);
            if ($result-> num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['payment_schedule'] . "</td>
                    <td>" . $row['bill_number'] . "</td>
                    <td>" . $row['amount_paid'] . "</td>
                    <td>" . $row['balance_amount'] . "</td>
                    <td class='text-nowrap'>" . $row['date'] . "</td>
                    <td><i class='bi bi-eye text-info'></i></td>
                  </tr>";
                }
            }else {
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