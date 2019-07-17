<?php
  error_reporting(E_ALL);
  ini_set('display_errors',1);
	$output="";
 // include_once('db.php'); //Connect to database
  if(isset($_POST['name'])){
   // $q = $_POST['q'];

    //get required columns
    /*$query = mysqli_query($conn, "SELECT * FROM `words` WHERE `englishWord` LIKE '%$q%' OR `yupikWord` LIKE '%$q%'") or die(mysqli_error($conn)); //check for query error*/
    $count = 2;
    if($count == 0){
      $output = '<h2>No result found</h2>';
    }else{
      
        $output .= '<h2>Test</h2><br>';
        $output .= '<h2>Test2</h2><br>';
        $output .= '<h2>Test3</h2><br>';
        //$audio_name = $row['audio'];
      //  $output .= '<td><audio src="audio/'.$audio_name.'" controls="control">'.$audio_name.'</audio></td>';
      
    }
    echo $output;
  }else{
     echo "Error";
  }

 // mysqli_close($conn);
?>