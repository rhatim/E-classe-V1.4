<?php
  $title = $_POST['title'];
  $teacher = $_POST['teacher'];
  $period = $_POST['period'];
  $conn = new mysqli('localhost', 'root','', 'e_classe_db');
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }else{
    $stmt = $conn->prepare("INSERT INTO course(title,teacher,period) VALUES(?,?,?)");
    $stmt->bind_param("sss",$title,$teacher,$period);
    $stmt->execute();
    echo "<script>window.location.replace('course.php')</script>";
    $stmt->close();
    $conn->close();
  }
?>