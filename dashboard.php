<?php
    include("init.php");
    
    $no_of_classes=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `class`"));
    $no_of_students=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `students`"));
    $no_of_result=mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(*) FROM `result`"));
?>
        
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
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="normalize.css">
    <title>Dashboard</title>
    <style>
        .main{
            border-radius: 10px;
            border-width: 5px;
            border-style: solid;
            padding: 20px;
            margin: 7% 20% 0 20%;
        }
    </style>
</head>
<body>
        
    <div class="title">
 	
        <a href="dashboard.php"><img src="./jpkp.png" alt="" class="logo"></a>
        <span class="heading" style="font-family:times new roman">Dashboard</span>
        <a href="logout.php" style="color: white"><span class="fa fa-sign-out fa-2x">Logout</span></a>
    </div>

    <div class="nav">
        <ul>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn" style="font-size:2vw">Classes &nbsp
                    <span class="fa fa-angle-down" styel="size:2vw"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Add Class</a>
                    <a href="manage_classes.php">Manage Class</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn" style="font-size:2vw" style="text-align:center">Students &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn" style="font-size:2vw">Results &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Add Results</a>
                    <a href="manage_results.php">Manage Results</a>
                </div>
            </li>
		<li class="dropdown" onclick="toggleDisplay('4')">
                <a href="#" class="dropbtn" style="font-size:2vw">Attendance &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="4">
                    <a href="add_attendance.php">Add attendance</a>
                    <a href="manage_attendance.php">Manage attendance</a>
                </div>
            </li>
        </ul>
    </div>
<div class="main">
            <b><span style="color:YELLOW;">1st Instruction to the Admin</span></b>
<h1 class="header">
            <span class="textbox1" >Add Class properly with Class name and year(ex: CIVIL 1ST YEAR)</span>
           
	    
</h1>
</div>
<div class="main">
            <b><span style="color:YELLOW;">2nd Instruction to the Admin</span></b>
<h1 class="header">
           
            <span class="textbox1" >Add Student Name and PIN NO properly with Appropriate Details</span>
	 
</h1>
</div>
<div class="main">
            <b><span style="color:YELLOW;">3rd Instruction to the Admin</span></b>
<h1 class="footer">
           
           <span class="textbox1" >Add Correct Results properly to the student with appropriate Class name and year and PIN NO too.</span>
	 
</h1>
</div>

    

    <div class="footer">
        <!-- <span>From CCBD Final Year</span> -->
    </div>
</body>
</html>

<?php
   include('session.php');
?>