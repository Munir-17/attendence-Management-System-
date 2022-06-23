<?php
    session_start();
    if(!isset($_SESSION['email'])){  
      header('location:login.php');
  }
    include '../DB/config.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Munir Inc</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../assests/css/lib3.min.css">
        <script type="text/javascript" src="../assests/js/jlib.min.js"></script>
        <script type="text/javascript" src="../assests/js/lib3.min.js"></script>
        <style type="text/css">
            .wrapper{
                /*width: 650px;*/
                margin: 0 auto;
            }
            .page-header h2{
                margin-top: 0;
            }
            table tr td:last-child a{
                margin-right: 15px;
            }
      </style>
      <link rel="stylesheet" type="text/css" href="../assests/css/main.css">
        <script type="text/javascript">
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();   
            });
        </script>
    </head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Munir Inc</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php">Dashboard</a> </li>
            <li><a href="emp.php">Add Employee</a> </li>
            <li><a href="task.php">Add Task</a> </li>
            <li><a href="manage.php">Manage Data</a> </li>

        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> LogOut </a></li>
      </ul>
    </div>
  </div>
</nav>