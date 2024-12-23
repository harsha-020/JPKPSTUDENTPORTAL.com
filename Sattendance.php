<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student.css">
    <title>Result</title>
</head>
<body><?php
        include("init.php");

        if(!isset($_GET['class']))
            $class=null;
        else
            $class=$_GET['class'];
        $rn=$_GET['rn'];

        // validation
        if (empty($class) or empty($rn) or preg_match("/[a-z]/i",$rn)) {
            if(empty($class))
                echo '<p class="error">Please select your class</p>';
            if(empty($rn))
                echo '<p class="error">Please enter your roll number</p>';
	exit();
        }
$name_sql=mysqli_query($conn,"SELECT `name` FROM `attendance` WHERE `rno`='$rn' and `class`='$class'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
        }

        $result_sql=mysqli_query($conn,"SELECT `w`, `p`, `total`, `attpercentage` FROM `attendance` WHERE `rno`='$rn' and `class`='$class'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $w = $row['w'];
            $p = $row['p'];
           
            $total = $row['total'];
            $attpercentage = $row['attpercentage'];
        }
        if(mysqli_num_rows($result_sql)==0){
            echo "<p style=font-family:verdana;>Oops! No Result Found For Selected Student</p>";
            exit();
        }
    ?>
     <div class="container" style="color:blue;">
        <div class="details">
            
            <?php echo '<p>Sri Jyothi Polytechnic::Kalavapamula</p>';?>
            <span>Student Name:</span> <?php echo $name ?> <br>
            <span>Student Class:</span> <?php echo $class; ?> <br>
            <span>Student PIN No:</span> <?php echo $rn; ?> <br>
        </div>

        <div class="main">
            <div class="s1">
                <p>Attendance Days</p>
                <p>Working Days</p>
                <p>Present Days</p>
                
            </div>
            <div class="s2">
                <p>Attendance</p>
                <?php echo '<p>'.$w.'</p>';?>
                <?php echo '<p>'.$p.'</p>';?>
                
            </div>
        </div>

        <div class="result" style="color:blue";>
            
            <?php echo '<p>Total Present Days:&nbsp'.$total.'</p>';?>
            <?php echo '<p>Percentage:&nbsp'.$attpercentage.'%</p>';?>
        </div>

        <div class="button">
            <button onclick="window.print()">Download Attendance</button>
        </div>
    </div>
</body>
</html>
