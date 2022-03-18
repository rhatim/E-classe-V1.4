<?php
  $conn = new mysqli('localhost', 'root','', 'e_classe_db');
  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM course WHERE id=$id") or die($conn->error());
    echo "<script>window.location.replace('course.php')</script>";
  }
?>