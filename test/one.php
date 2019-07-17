<?php  
//$servername = "localhost";  
//$username = "root";  
//$password = "";  
//$db = "test";  
// Create connection  
//$conn = new mysqli($servername,$username,$password,$db);  
if(isset($_POST['submitform'])){  
echo "<pre>"; print_r($_POST) ;  echo "</pre>";
$title = $_POST['title'];  
$name = $_POST['name'];  
$department = $_POST['department'];  
$task = $_POST['task'];  
$date =$_POST['datepicker'];  
$assign = $_POST['assign'];  
$now =date('m/d/Y h:i:s a', time());  
/*$query = "CREATE EVENT IF NOT EXISTS $title  
ON SCHEDULE AT '$date'  
DO  
INSERT INTO task(name,department,task,assign,deadline,created_at) VALUES ('$name','$department','$task','$assign','$date','$now')  
;";  
mysqli_query($conn,$query); */ 
echo "<center><br>Event has been created.<br/> You're notified that this will be fired automatically on your set date !<br/><br/>Redirecting back in 5 seconds ...";  
//header("Refresh: 1; url=test2.php");  
//mysqli_close($conn);  
};  
?>  