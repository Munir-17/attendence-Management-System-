<?php include 'header.php' ?>

<?php 
    // Include config file
    require_once "DB/config.php";
    $d=date('Y/m/d');
    $em=$_SESSION['eemail'];


    $sqlGet="SELECT * FROM employee WHERE `email`= '".$em."'";
    $result1= mysqli_query($conn,$sqlGet);
    $row1=mysqli_fetch_array($result1);

    $empID=$row1['empID'];
      
?>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <!-- <h2 class="pull-left">Teachers Details</h2> -->

                        <div class="pull-right">
                        </div>

                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#task1_table">Today's Tasks</a></li>
                            <li><a data-toggle="tab" href="#task_table">All Tasks</a></li>
                          </ul>

                    </div>

                    <div class="tab-content">
                        
                        <div id="task1_table" class="tab-pane fade in active table-responsive">
                            <?php 

                                // Attempt select query execution
                                $sql = "SELECT * FROM task where `date`='$d' AND `empID`='$empID'";

                                if($result = $conn->query($sql)){
                                    if($result->num_rows > 0){
                                        ?>
                                        <table class='table table-bordered table-striped'>
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>empID</th>
                                                    <th>Date</th>
                                                    <th>Task</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while($row = $result->fetch_array()){
                                                echo "<tr>";
                                                    echo "<td>" . $row['taskID'] . "</td>";
                                                    echo "<td>" . $empID . "</td>";
                                                    echo "<td>" . $row['date'] . "</td>";
                                                    echo "<td>" . $row['taskdescription'] . "</td>";
                                                    
                                                echo "</tr>";
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
                            
                        <?php 

                            // if($department_=="*"){
                                echo '<div id="task_table" class="tab-pane fade table-responsive">';

                                // Attempt select query execution
                                $sql = "SELECT * FROM task where `empID`='$empID' " ;

                                if($result = $conn->query($sql)){
                                    if($result->num_rows > 0){
                                        ?>
                                        <table class='table table-bordered table-striped'>
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>empID</th>
                                                    <th>Date</th>
                                                    <th>Task</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while($row = $result->fetch_array()){
                                                echo "<tr>";
                                                    echo "<td>" . $row['taskID'] . "</td>";
                                                    echo "<td>" . $empID . "</td>";
                                                    echo "<td>" . $row['date'] . "</td>";
                                                    echo "<td>" . $row['taskdescription'] . "</td>";
                                                    
                                                echo "</tr>";
                                            }
                                            echo "</tbody>";                            
                                        echo "</table>";
                                        // Free result set
                                        $result->free();
                                    } else{
                                        echo "<p class='lead'><em>No records were found.</em></p>";
                                    }
                                }

                                echo '</div>';
                            // }
                        ?>

                        
                    </div>

                </div>
            </div>        
        </div>
    </div>

<?php 
    // Close connection
    $conn->close();
?>
</body>
</html>