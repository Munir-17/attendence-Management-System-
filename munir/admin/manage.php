<?php include 'header.php' ?>

<?php 
    // Include config file
    require_once "../DB/config.php";
    $d=date('Y/m/d');
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
                            <li class="active"><a data-toggle="tab" href="#emp_table">Employees </a></li>
                            <li><a data-toggle="tab" href="#att_table">All Attendance</a></li>
                            <li><a data-toggle="tab" href="#att1_table">Today's Attendance</a></li>
                            <li><a data-toggle="tab" href="#task_table">All Tasks</a></li>
                            <li><a data-toggle="tab" href="#task1_table">Today's Tasks</a></li>
                            <li><a data-toggle="tab" href="#admin_table">Admins</a></li>
                          </ul>

                    </div>

                    <div class="tab-content">
                        
                        <div id="emp_table" class="tab-pane fade in active table-responsive">
                            <?php
                            
                                // Attempt select query execution
                                    $sql = "SELECT * FROM employee";
                                if($result = $conn->query($sql)){
                                    if($result->num_rows > 0){
                                       ?>
                                        <table class='table table-bordered table-striped'>
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Surname</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Department</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while($row = $result->fetch_array()){
                                                echo "<tr>";
                                                    echo "<td>" . $row['empID'] . "</td>";
                                                    echo "<td>" . $row['name'] . "</td>";
                                                    echo "<td>" . $row['surname'] . "</td>";
                                                    echo "<td>" . $row['email'] . "</td>";
                                                    echo "<td>" . $row['phone'] . "</td>";
                                                    echo "<td>" . $row['department'] . "</td>";
                                                    
                                                echo "</tr>";
                                            }
                                            echo "</tbody>";                            
                                        echo "</table>";
                                        // Free result set
                                        $result->free();
                                    } else{
                                        echo "<p class='lead'><em>No records were found.</em></p>";
                                    }
                                } else{
                                    echo "ERROR: Could not able to execute $sql. " . $connection->error;
                                }
                            
                            ?>
                        </div>

                        <?php 

                            // if($department_=="*"){
                                echo '<div id="att_table" class="tab-pane fade table-responsive">';

                                // Attempt select query execution
                                $sql = "SELECT * FROM attendance";

                                if($result = $conn->query($sql)){
                                    if($result->num_rows > 0){
                                        ?>
                                        <table class='table table-bordered table-striped'>
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>empID</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while($row = $result->fetch_array()){
                                                echo "<tr>";
                                                    echo "<td>" . $row['atID'] . "</td>";
                                                    echo "<td>" . $row['empID'] . "</td>";
                                                    echo "<td>" . $row['status'] . "</td>";
                                                    echo "<td>" . $row['date'] . "</td>";
                                                    echo "<td>" . $row['time'] . "</td>";
                                                    
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

                        <?php 

                            echo '<div id="att1_table" class="tab-pane fade table-responsive">';

                            // Attempt select query execution
                            $sql = "SELECT * FROM attendance where `date`='$d'";

                            if($result = $conn->query($sql)){
                                if($result->num_rows > 0){
                                    ?>
                                    <table class='table table-bordered table-striped'>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>empID</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        while($row = $result->fetch_array()){
                                            echo "<tr>";
                                                echo "<td>" . $row['atID'] . "</td>";
                                                echo "<td>" . $row['empID'] . "</td>";
                                                echo "<td>" . $row['status'] . "</td>";
                                                echo "<td>" . $row['date'] . "</td>";
                                                echo "<td>" . $row['time'] . "</td>";
                                                
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

                        <?php 

                            
                                echo '<div id="admin_table" class="tab-pane fade table-responsive">';

                                // Attempt select query execution
                                $sql = "SELECT * FROM `admin`";

                                if($result = $conn->query($sql)){
                                    if($result->num_rows > 0){
                                        ?>
                                        <table class='table table-bordered table-striped'>
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while($row = $result->fetch_array()){
                                                echo "<tr>";
                                                    echo "<td>" . $row['id'] . "</td>";
                                                    echo "<td>" . $row['name'] . "</td>";
                                                    echo "<td>" . $row['email'] . "</td>";
                                                    echo "<td>" . $row['phone'] . "</td>";
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
                            
                        ?>
                        
                        <?php 

                            // if($department_=="*"){
                                echo '<div id="task_table" class="tab-pane fade table-responsive">';

                                // Attempt select query execution
                                $sql = "SELECT * FROM task";

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
                                                    echo "<td>" . $row['empID'] . "</td>";
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

                        <?php 

                        // if($department_=="*"){
                            echo '<div id="task1_table" class="tab-pane fade table-responsive">';

                            // Attempt select query execution
                            $sql = "SELECT * FROM task where `date`='$d'";

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
                                                echo "<td>" . $row['empID'] . "</td>";
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