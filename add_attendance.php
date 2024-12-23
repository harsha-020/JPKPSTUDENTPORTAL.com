<!DOCTYPE html>
<html lang="en">
<head>
<style>
body{
background-image:url('home3.jpg');
background-repeat:no-repeat;
background-attachment:fixed;
background-size:100% 100%;

}

</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="./css/form.css">
    <title>Dashboard</title>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./jpkp.png" alt="" class="logo"></a>
        <span class="heading">Dashboard</span>
        <a href="logout.php" style="color: white"><span class="fa fa-sign-out fa-2x">Logout</span></a>
    </div>

    <div class="nav">
        <ul>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Classes &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Add Class</a>
                    <a href="manage_classes.php">Manage Class</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Students &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Results &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Add Results</a>
                    <a href="manage_results.php">Manage Results</a>
                </div>
            </li>
		<li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">attendance &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_attendance.php">Add attendance</a>
                    <a href="manage_attendance.php">Manage attendance</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <form action="" method="post">
            <fieldset>
            <legend>Student Attendance</legend>

                <?php
                    include("init.php");
                    include("session.php");

                    $select_class_query="SELECT `name` from `class`";
                    $class_result=mysqli_query($conn,$select_class_query);
                    //select class
                    echo '<select name="class_name">';
                    echo '<option selected disabled>Select Class</option>';
                    
                        while($row = mysqli_fetch_array($class_result)) {
                            $display=$row['name'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                    echo'</select>';                      
                ?>

                <input type="text" name="rno" placeholder="Roll No">
                <input type="text" name="w" id="" placeholder="working days">
                <input type="text" name="p" id="" placeholder="present days">
                
                <input type="submit" value="Submit">
            </fieldset>
        </form>
    </div>

</body>
</html>

<?php
    if(isset($_POST['rno'],$_POST['w'],$_POST['p']))
    {
        $rno=$_POST['rno'];
        if(!isset($_POST['class_name']))
            $class=null;
        else
            $class=$_POST['class_name'];
        $w=(int)$_POST['w'];
        $p=(int)$_POST['p'];
       
        $total=$p
        

       

        $name=mysqli_query($conn,"SELECT `class` FROM `students` WHERE `rno`='$rno' and `class`='$class_name'");
        while($row = mysqli_fetch_array($name)) {
            $display=$row['name'];
            echo $display;
         }

        $sql="INSERT INTO `attendance` (`name`, `rno`, `class`, `w`, `p` `total`, `attpercentage`) VALUES ('$display', '$rno', '$class', '$w', '$p',  '$total', '$attpercentage')";
        $sql=mysqli_query($conn,$sql);

        if (!$sql) {
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Successful")';
            echo '</script>';
        }
    }
?>