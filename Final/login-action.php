<?php


// Initiate Server
$servername = "webdesignfinal.ccxaerxt39bn.us-west-2.rds.amazonaws.com:3306";
$usernameServer = "webteam";
$passwordServer = "12345678";
$dbname = "findCircle";

// Create connection
$conn = mysqli_connect($servername, $usernameServer, $passwordServer, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connection succeed<br>";
}

//--------------------------------------------------------------------------

$username = "";
$password = "";

$username = $_POST['email']; 
$password = $_POST['password']; 

// Set up SQL statement
$sql="SELECT * FROM Users WHERE Email = '$username'";
$result=mysqli_query($conn, $sql);

// Counting table row
$count=mysqli_num_rows($result);

// If result matched email and password, table row must be 1 row
if($count==1){
    $row = mysqli_fetch_assoc($result);
    if ($password == $row['Password']){
        echo "Login Successful<br>";
        echo $row['Email']."<br>";
        echo $row['Password']."<br>";
        //Session set up
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $_SESSION["userId"] = $row['User_Id'];
        
    } else {
        echo "Wrong Username or Password - 1<br> ";
        echo $username."<br>";
        echo $password."<br>";
        
    }
} else {
    echo "Wrong Username or Password - 2<br>";
    echo $username."<br>";
    echo $password."<br>";
}

?>