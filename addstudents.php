<?php
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $enroll_number = $_POST['enroll_number'];
  $date_of_admission = $_POST['date_of_admission'];

  
  $conn = new mysqli('localhost', 'root','', 'e_classe_db');

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }else{
    $ajt = $conn->prepare("INSERT INTO students(name, email, phone, enroll_number, date_of_admission) VALUES(?, ?, ?, ?, ?)");
    $ajt->bind_param("sssss",$name, $email, $phone, $enroll_number, $date_of_admission);
    $ajt->execute();
    echo "<script>window.location.replace('students.php')</script>";
    $ajt->close();
    $conn->close();
  }
?>