<?php include 'header.php' ?>
<?php 
    // Include config file
    require_once "../DB/config.php";

    $date=date('Y/m/d');

    $sql3="SELECT * FROM `employee`";
    $result3=mysqli_query($conn,$sql3);
    $row3=mysqli_num_rows($result3);

    $sql2="SELECT * FROM `admin`";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_num_rows($result2);

    $sql="SELECT * FROM `attendance` WHERE `status`='present' AND `date`='$date'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_num_rows($result);
?>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading" style="color:#31708f; background-color: #d9edf7;">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-group fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $row3; ?></div>
                                        <div>Number of Employees</div>
                                    </div>
                                </div>
                            </div>
                            <a href="manage.php#emp_table">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading"  style="color:#31708f; background-color: #d9edf7;">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-group fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $row2; ?></div>
                                        <div>Number of Admins</div>
                                    </div>
                                </div>
                            </div>
                            <a href="manage.php#admin_table">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading"  style="color:#31708f; background-color: #d9edf7;">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-group fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $row; ?></div>
                                        <div>Employees Present Today</div>
                                    </div>
                                </div>
                            </div>
                            <a href="manage.php#att1_table">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
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