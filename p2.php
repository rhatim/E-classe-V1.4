<?php
include 'all.php';
$conn = new mysqli('localhost', 'root', '', 'e_classe_db');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


<div class="row mt-5 mx-2">
    <div class="col-lg col-md-6 mb-3">
        <div class="h-100 px-2 py-1" style="background-color: #F0F9FF; border-radius: 8px;">
            <h1><i class="bi bi-mortarboard" style="color: #74C1ED;"></i></h1>
            <p>Students</p>
            <h3 class="float-end">
                <?php
                $sql = "SELECT * FROM students";
                $res = mysqli_query($conn, $sql);
                $num_rows = mysqli_num_rows($res);
                echo $num_rows;
                ?>
            </h3>
        </div>
    </div>
    <div class="col-lg col-md-6 mb-3">
        <div class="h-100 px-2 py-1" style="background-color: #FEF6FB; border-radius: 8px;">
            <h1><i class="bi bi-bookmark" style="color: #EE95C5;"></i></h1>
            <p>Course</p>
            <h3 class="float-end">
                <?php
                $sql = "SELECT * FROM course";
                $res = mysqli_query($conn, $sql);
                $num_rows = mysqli_num_rows($res);
                echo $num_rows;
                ?>
            </h3>
        </div>
    </div>
    <div class="col-lg col-md-6 mb-3">
        <div class="h-100 px-2 py-2" style="background-color: #FEFBEC; border-radius: 8px;">
            <h3><i class="bi bi-currency-dollar" style="color: #00C1FE; border: 2px solid #00C1FE;"></i></h3>
            <p>Payments</p>
            <div class="d-lg-flex align-items-center float-end">
                <h6>DHS</h6>
                <h3>
                    <?php
                    $sum = "SELECT SUM(amount_paid) AS allpay FROM payments";
                    $result = mysqli_query($conn, $sum);
                    $total = mysqli_fetch_assoc($result);
                    $all = $total['allpay'];
                    echo $all;
                    ?>
                </h3>
            </div>
        </div>
    </div>
    <div class="col-lg  col-md-6 mb-3">
        <div class="h-100 px-2 py-1" style="background-image: linear-gradient(120deg,#00C1FE,#FAFFC1); border-radius: 8px;">
            <h1><i class="bi bi-person text-light"></i></h1>
            <p class="text-light">User</p>
            <h3 class="float-end">
                <?php
                $sql = "SELECT * FROM comptes";
                $res = mysqli_query($conn, $sql);
                $num_rows = mysqli_num_rows($res);
                echo $num_rows;
                ?>
            </h3>
        </div>
    </div>

</div>


</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>