<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
<body>




<?php
include ('connection.php');
@$db = mysqli_connect($DBHost, $DBUser, $DBPassword, $DBName);
$code = mysqli_connect_errno();

if($code){
    echo "Connection Failed: " . $code;
    exit();
 }

$t = $_GET["Choice"];
echo "<div class='centre'>";  
echo " Choice was ", $t;
if ($t == "0") { 
    $sql = "UPDATE RASP SET STATE=0 WHERE ID=1";
    $result=mysqli_query($db, $sql);
    if ($result){
        echo "<h3>Changed to Dark</h3>";
    }
    else {
        echo "<h3>An error occured, Try again</h3>";
    }
echo "</div>";
}
else{
$sql="UPDATE RASP SET STATE=1 WHERE ID=1";
$result=mysqli_query($db, $sql);
    if ($result){
        echo "<h3>Changed to Bright</h3>";
    }
    else {
        echo "<h3>An error occured, Try again</h3>";
    }
}
echo "<div class='centre'>";
echo "<a class='btn btn-primary' href='index.php' role='button'>Back to Home</a>";
echo "</div>"; 
mysqli_close($db);
?>





</body>
</html>




