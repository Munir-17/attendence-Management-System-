<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Munir Inc</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="assests/css/lib3.min.css">
        <script type="text/javascript" src="assests/js/jlib.min.js"></script>
        <script type="text/javascript" src="assests/js/lib3.min.js"></script>
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
      <link rel="stylesheet" type="text/css" href="assests/css/main.css">
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
  </div>
</nav>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Login</h2>
                    </div>
                    <p>Please fill this form and submit to login</p>
                    <form action="" method="post"  class="inner_form">
                
                        <label for="email">EMAIL ADDRESS</label>
                        <input id="email" class="form-control"<?php if(isset($_REQUEST["email"])) echo "value=\"".$_REQUEST["email"]."\"";?> name="email" placeholder="" type="email" required style="color:black;"/>
                    
                        <label for="password">PASSWORD</label>
                        <input id="password" class="form-control"<?php if(isset($_REQUEST["password"])) echo "value=\"".$_REQUEST["password"]."\"";?> name="password" placeholder="" type="password" required style="color:black;"/>
                    
                        <br>
                        <input type="submit" class="btn btn-info" value="Submit" name="login">
                    </form>
                </div>
            </div>        
        </div>
    </div>

<br>

</body>
</html>

<?php 
    include 'DB/config.php';
if (isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query="SELECT * FROM `employee` WHERE `email`= '".$email."' AND `password`='".$password."' ";
    $result=mysqli_query($conn, $query);
    $row=mysqli_fetch_array($result);
    if (is_array($row)){
        $_SESSION['eemail']=$row['email'];
        $_SESSION['epassword']=$row['password'];
        echo '<script type="text/javascript">alert("You have successfully logged in")</script>';
    }
    else{
        echo '<script type="text/javascript">alert("Please enter the correct details")</script>';
    }
}

if (isset($_SESSION['eemail'])) {
    header("Location:index.php");
}

?>
