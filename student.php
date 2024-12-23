<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/student.css">
    <title>Result</title>
</head>
<body>
    <?php
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
            if(preg_match("/[a-z]/i",$rn))
                echo '<p class="error">Please enter valid roll number</p>';
            exit();
        }

        $name_sql=mysqli_query($conn,"SELECT `name` FROM `students` WHERE `rno`='$rn' and `class_name`='$class'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
        }

        $result_sql=mysqli_query($conn,"SELECT `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage` FROM `result` WHERE `rno`='$rn' and `class`='$class'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $p1 = $row['p1'];
            $p2 = $row['p2'];
            $p3 = $row['p3'];
            $p4 = $row['p4'];
            $p5 = $row['p5'];
            $mark = $row['marks'];
            $percentage = $row['percentage'];
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
                <p>Subjects</p>
                <p>SUB 1</p>
                <p>SUB 2</p>
                <p>SUB 3</p>
                <p>SUB 4</p>
                <p>SUB 5</p>
            </div>
            <div class="s2">
                <p>Marks</p>
                <?php echo '<p>'.$p1.'</p>';?>
                <?php echo '<p>'.$p2.'</p>';?>
                <?php echo '<p>'.$p3.'</p>';?>
                <?php echo '<p>'.$p4.'</p>';?>
                <?php echo '<p>'.$p5.'</p>';?>
            </div>
        </div>

        <div class="result" style="color:blue";>
            
            <?php echo '<p>Total Marks:&nbsp'.$mark.'</p>';?>
            <?php echo '<p>Percentage:&nbsp'.$percentage.'%</p>';?>
        </div>

        <div class="button">
            <button onclick="window.print()">Download Result</button>
        </div>
    </div>
 <?php
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
$name_sql=mysqli_query($conn,"SELECT `name` FROM `attendance` WHERE `rno`='$rn' and `class_name`='$class'");
        while($row = mysqli_fetch_assoc($name_sql))
        {
        $name = $row['name'];
        }

        $result_sql=mysqli_query($conn,"SELECT `w`, `p`, `total`, `attpercentage` FROM `attendance` WHERE `rno`='$rn' and `class`='$class'");
        while($row = mysqli_fetch_assoc($result_sql))
        {
            $p1 = $row['w'];
            $p2 = $row['p'];
           
            $total = $row['total'];
            $attpercentage = $row['attpercentage'];
        }
        if(mysqli_num_rows($result_sql)==0){
            echo "<p style=font-family:verdana;>Oops! No Result Found For Selected Student</p>";
            exit();
        }
    ?>
div class="container" style="color:blue;">
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
                <p>Marks</p>
                <?php echo '<p>'.$w.'</p>';?>
                <?php echo '<p>'.$p.'</p>';?>
                
            </div>
        </div>

        <div class="result" style="color:blue";>
            
            <?php echo '<p>Total Marks:&nbsp'.$toatl.'</p>';?>
            <?php echo '<p>Percentage:&nbsp'.$attpercentage.'%</p>';?>
        </div>

        <div class="button">
            <button onclick="window.print()">Download Attendance</button>
        </div>
    </div>

</body>
</html>