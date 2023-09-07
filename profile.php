<html>
<head>
  <script src="jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="./style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
</head>
</html>
<?php
   include("config.php");
   session_start();

   if($_GET['edit'] != 1){
   // Username is root
   $user = 'root';
   $password = '';
   
   // Database name is geeksforgeeks
   $database = 'guvi';
   
   
   // Server is localhost with
   // port number 3306
   $servername='localhost:3306';
   $mysqli = new mysqli($servername, $user,
           $password, $database);
   
   // Checking for connections
   if ($mysqli->connect_error) {
     die('Connect Error (' .
     $mysqli->connect_errno . ') '.
     $mysqli->connect_error);
   }
   
   // SQL query to select data from database
   $sql = " SELECT * FROM profile WHERE email = '" . $_SESSION['login_user'] ."'";
   $result = $mysqli->query($sql);
   
   if($result->num_rows != 0){
     $mysqli->close();
     header("Location: dashboard.php");
     die();
   }
   
   $mysqli->close();
   }


   
  

?>
<div class="profile-page">
<h3 style="text-align:center;">Personal Details</h3>
<form name="regg" class="row g-3" id="regg">
  <div class="col-md-6">
    <label for="inputfname" class="form-label">First name</label>
    <input type="text" name="fname" class="form-control" id="inputfname">
  </div>
  <div class="col-md-6">
    <label for="inputlname" class="form-label">Last name</label>
    <input type="text" name="lname" class="form-control" id="inputlname">
  </div>
  <div class="col-md-6">
    <label for="inputdob" class="form-label">Date of Birth</label>
    <input type="date" name="dob" class="form-control" id="inputdob">
  </div>
  <div class="col-md-2">
    <label for="inputage" class="form-label">Age</label>
    <input type="number" name="age" class="form-control" id="inputage">
    
  </div>
  <div class="col-md-4">
    <label for="inputnumber" class="form-label">Contact number</label>
    <input type="text" name="num" class="form-control" id="inputnumber">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" name="addr" class="form-control" id="inputAddress" placeholder="Door no,Apartment,Street">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" name="city"class="form-control" id="inputCity">
  </div>
  <div class="col-md-4">
    <label for="inputState" class="form-label">State</label>
    <select class="form-control" name="state" id="inputState">
                        <option value="SelectState">Select State</option>
                        <option value="Andra Pradesh">Andra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madya Pradesh">Madya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Orissa">Orissa</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttaranchal">Uttaranchal</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="West Bengal">West Bengal</option>
                        <option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Lakshadeep">Lakshadeep</option>
                        <option value="Pondicherry">Pondicherry</option>
                      </select>
    
  </div>
  <div class="col-md-2">
    <label for="inputZip" class="form-label" value="$zip">Zip</label>
    <input type="text" name="zip" class="form-control" id="inputZip">
  </div>
 
  <div class="col-12">
    <button type="submit" name="regg"class="btn btn-primary">Update</button>
  </div>
</form>
</div>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
$(document).on('submit', '#regg', function (e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_regg", true);


            $.ajax({
                type: "POST",
                url: "insert3.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    window.location.href="dashboard.php";
                    
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);

                    }else if(res.status == 200){

                        $('#errorMessage').addClass('d-none');
                        $('#reg')[0].reset();

                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#user').load(location.href + " #user"); //to reload the table

                    }else if(res.status == 500) {
						$('#errorMessage').addClass('d-none');
                        $('#reg')[0].reset();  //to reset the form to empty
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);
                    }
                }
            });

        });	
        </script>