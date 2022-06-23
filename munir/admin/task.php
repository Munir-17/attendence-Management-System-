<?php include 'header.php' ?>

<?php 
    // Include config file
    require_once "../DB/config.php";
    $date=date('Y/m/d');
?>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="page-header">
                        <h2>Add Employee Task</h2>
                    </div>
                    <p>Give employees that are present the tasks for the day : <strong><?php echo $date; ?></strong>.</p>
                <?php 
                            
                            // Attempt select query execution
                            $sql = "SELECT * FROM attendance where `status`='present' AND `date`='$date'";

                            if($result = $conn->query($sql)){
                                if($result->num_rows > 0){
                                    ?>
                                    <table class='table table-bordered table-striped'>
                                        <thead>
                                            <tr>
                                                <th>empID</th>
                                                <th>Task</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        while($row = $result->fetch_array()){
                                            $id=$row['empID'];
                                            ?>
                                            <tr>
                                                <td><?php echo $id; ?></td>
                                                <td><form action="" method="post">
                                
                                    <input type="text" name="tas" required style="width:60%;">
                                    
                                    <input type="submit" class="btn btn-info" value="Submit" name="submit"></form> </td>
                                                
                                            </tr>
                                            <?php
                                        }
                                        echo "</tbody>";                            
                                    echo "</table>";
                                    // Free result set
                                    $result->free();
                                } else{
                                    echo "<p class='lead'><em>No records were found.</em></p>";
                                }
                            }

                        
                    ?>
            </div>        
        </div>
    </div>

<?php

    if (isset($_POST['tas']) && isset($_POST['submit'])){
        $tas=$_POST['tas'];

        $is_insert=$conn->query("INSERT INTO `task`(`empID`, `date`, `taskdescription`) VALUES ('$id','$date', '$tas')");
        if ($is_insert== TRUE){
            echo '<script type="text/javascript">alert("Employee successfully given task")</script>';
        }

    }
?>
<?php 
    // Close connection
    $conn->close();
?>
</body>
</html>
