<?php include 'header.php' ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Add New Employee</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="" method="post"  class="inner_form">
                
                        <label for="name">NAME</label>
                        <input id="name" class="form-control" <?php if(isset($_REQUEST["name"])) echo "value=\"".$_REQUEST["name"]."\"";?> name="name" placeholder="" type="text" required style="color:black;"/>
                    
                        <label for="surname">SURNAME</label>
                        <input id="surname" class="form-control" <?php if(isset($_REQUEST["surname"])) echo "value=\"".$_REQUEST["surname"]."\"";?> name="surname" placeholder="" type="text" required style="color:black;"/>
                    
                        <label for="department">DEPARTMENT</label>
                        <input id="department" class="form-control"<?php if(isset($_REQUEST["department"])) echo "value=\"".$_REQUEST["department"]."\"";?> name="department" placeholder="" type="text" required style="color:black;"/>
                    
                        <label for="phone">PHONE NUMBER</label>
                        <input id="phone" class="form-control" <?php if(isset($_REQUEST["phone"])) echo "value=\"".$_REQUEST["phone"]."\"";?> name="phone" placeholder="" type="text" required style="color:black;"/>
                    
                        <label for="email">EMAIL ADDRESS</label>
                        <input id="email" class="form-control"<?php if(isset($_REQUEST["email"])) echo "value=\"".$_REQUEST["email"]."\"";?> name="email" placeholder="" type="email" required style="color:black;"/>
                    
                        <label for="password">SET PASSWORD</label>
                        <input id="password" class="form-control"<?php if(isset($_REQUEST["password"])) echo "value=\"".$_REQUEST["password"]."\"";?> name="password" placeholder="" type="password" required style="color:black;"/>
                    
                        <label for="confirm">CONFIRM PASSWORD</label>
                        <input id="confirm" class="form-control"<?php if(isset($_REQUEST["confirm"])) echo "value=\"".$_REQUEST["confirm"]."\"";?> name="confirm" placeholder="" type="password" required style="color:black;"/>
                        <br>
                        <input type="submit" class="btn btn-info" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>

<br>

</body>
</html>

<?php
    if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['department']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm']) ){
        $name=$_POST['name'];
        $surname=$_POST['surname'];
        $department=$_POST['department'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirm=$_POST['confirm'];
        
        if($password==$confirm){
            $is_insert=$conn->query("INSERT INTO `employee`(`name`, `surname`, `department`, `phone`, `email`, `password`) VALUES ('$name', '$surname','$department', '$phone' ,'$email', '$password')");
            if ($is_insert== TRUE){
                echo '<script type="text/javascript">alert("New employee successfully added")</script>';
            }
        }else{
            echo '<script type="text/javascript">alert("make sure the password and checkpassword are the same!")</script>';
            exit();
        }
    }
?>