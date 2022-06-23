<?php include 'header.php'; 
    $email = $_SESSION['eemail'];
?>
<?php 
$sel=mysqli_query($conn, "SELECT * FROM `employee` WHERE `email`='$email'");
$num=mysqli_num_rows($sel);
$cols=mysqli_fetch_assoc($sel);
$date=date('Y/m/d');
$t=date('H:i:sa');
$id = $cols['empID'];
?>
<div class="row" style="margin-top:20px; margin-left:20%;">
                <div class="col-lg-8">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                My User Info
                            </div>
                            <div class="panel-body" align='center'>
                                <h5><b>Today's Date: </b><?php echo $date;?></h5>
                                <h5><b>Name: </b><?php echo $cols['name']; ?></h5>
                                <h5><b>Surname: </b><?php echo $cols['surname']; ?></h5>
                                <h5><b>Email: </b><?php echo $email; ?></h5>
                                <h5><b>Department: </b><?php echo $cols['department']; ?></h5>
                                <h5><b>Phone Number: </b><?php echo $cols['phone'];?></h5>
                            </div>
                            <div class="panel-heading">
                            <?php 
                            $sql=mysqli_query($conn, "SELECT * FROM `attendance` WHERE `empID`='$id' AND `date`='$date'");
                            $result=mysqli_num_rows($sql);
                            $row=mysqli_fetch_assoc($sql);

                            if (is_array($row)){
                                echo 'Attendance status has been marked';
                            }else{
                                ?>
                              <form action="" method="post">
                                <h5><b>Mark Attendance: </b>
                                    <input type="radio" name="attend" value="present">Present 
                                    <input type="radio" name="attend" value="absent">Absent
                                    
                                    <input type="submit" class="btn btn-info" value="Submit" name="submit">
                                </h5></form>  
                                <?php
                            }
                            ?>
                           
                            </div>
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>


    </body>
</html>

<?php

    if (isset($_POST['attend']) && isset($_POST['submit'])){
        $attend=$_POST['attend'];

        $is_insert=$conn->query("INSERT INTO `attendance`(`empID`, `status`, `date`, `time`) VALUES ('$id', '$attend','$date', '$t')");
        if ($is_insert== TRUE){
            echo '<script type="text/javascript">alert("Your attendance register has been successfully marked")</script>';
        }

    }
?>