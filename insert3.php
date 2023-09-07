<?php 
include("config.php");

session_start();

if(isset($_POST['save_regg']))
{
	$fname = mysqli_real_escape_string($db, $_POST['fname']);
    $lname = mysqli_real_escape_string($db, $_POST['lname']);
    $dob = mysqli_real_escape_string($db, $_POST['dob']);
    $age = mysqli_real_escape_string($db, $_POST['age']);
    $num = mysqli_real_escape_string($db, $_POST['num']);
    $addr = mysqli_real_escape_string($db, $_POST['addr']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $state = mysqli_real_escape_string($db, $_POST['state']);
    $zip = mysqli_real_escape_string($db, $_POST['zip']);
    $email =  $_SESSION['login_user'];
	if($fname == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }
	
    
	
    $query = "INSERT INTO profile (fname,lname,dob,age,num,addr,city,state,zip, email) VALUES('$fname','$lname','$dob','$age','$num','$addr','$city','$state','$zip', '$email')";
    $query_run = mysqli_query($db, $query);

       if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Details Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Details Not Updated'
        ];
        echo json_encode($res);
        return;
    }
	
}

	  
?>