<?php


  $conn = new mysqli('localhost', 'root','', 'e_classe_db');
  
  if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM students WHERE id=$id") or die($conn->error());
    echo "<script>
    window.location.replace('students.php')
    </script>";
  }
?>