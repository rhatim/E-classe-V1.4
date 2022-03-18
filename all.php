<?php
include('timeout.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./p2.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <!--begining of sidebar-->
    <div style="overflow-x: hidden;" class="conatiner-fluid">
        <div class="row">
            <input type="checkbox" class="d-none" id="sidebar">
            <div id="sideb" style="background-color: #FAFFC1; " class="col-lg-2 col-md-3  col-sm-6 col-9 text-center  ">
                <label class="float-end text-dark" id="sb1" for="sidebar"><i class="bi bi-caret-left text-secondary btn"></i></label> 
                <h4 class="container  border-start border-5 border-info  mx-1 text-start mt-3 mb-4">E-classe</h4>
                <img src="images/youcode.png" class="rounded-circle mt-5 " alt="img-user">
                <h5 class=""><?php echo $_SESSION['name']?></h5>
                <h6 class="text-info mb-5">Admin</h6>
                <ul class="nav nav-pills mt-5 d-flex flex-column">
                    <li class=""><a class="ps-0 text-dark btn btn-outline-info border-0 my-2 <?php if(basename($_SERVER['REQUEST_URI']) == "p2.php") echo "active";?>" href="p2.php"><i class="bi bi-house-door mx-3"></i><span class=" ">Home</span></a></li>
                    <li><a class=" ps-0 text-dark btn btn-outline-info border-0 <?php if(basename($_SERVER['REQUEST_URI']) == "course.php") echo "active";?> " href="course.php"><i class="bi bi-bookmark mx-3"></i><span class=" d-sm-inline">Course</span></a></li>
                    <li><a class="ps-0 text-dark btn btn-outline-info border-0 my-2 <?php if(basename($_SERVER['REQUEST_URI']) == "students.php") echo "active";?>" href="students.php" ><i class="bi bi-mortarboard mx-3"></i><span class=" ">Students</span></a></li>
                    <li><a class="ps-0 text-dark btn btn-outline-info border-0 <?php if(basename($_SERVER['REQUEST_URI']) == "pay.php") echo "active";?>" href="pay.php" ><i class="bi bi-currency-dollar mx-3"></i><span class=" ">Payment</span></a></li>
                    <li><a class="ps-0 text-dark btn btn-outline-info border-0 my-2" href=""><i class="bi bi-file-earmark-bar-graph mx-3"></i><span class="">Report</span></a></li>
                    <li><a class="ps-0 text-dark btn btn-outline-info border-0 mb-3 " href=""><i class="bi bi-sliders mx-3"></i><span class=" ">Settings</span class="d-none d-sm-inline"></a></li>
                    <li><a class="ps-0 text-dark btn btn-outline-info border-0 mt-5 mb-5" href="logout.php"><span class="d-sm-inline">Logout</span><i class="bi bi-box-arrow-right ms-2"></i></a></li>
                </ul>

            </div>
            <div class="col-md">
                
            <div class="pt-3 px-3 d-flex justify-content-between shadow-sm">
                <label id="sb" for="sidebar"><i class="bi bi-caret-left text-secondary btn"  style="transform: rotate(180deg);"></i></label>
                <div>
                    <input class="border border form-label" style="border-radius: 8px;" type="recheche" placeholder="Search...                       🔍">
                    <i class="bi bi-bell text-secondary me-4 btn"></i>
                </div>
            </div>
            <!--end of side bar-->