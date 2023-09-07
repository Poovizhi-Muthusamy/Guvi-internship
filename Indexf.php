<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-sm-4">

    <!--===== Registration Form ============-->
    <table class="table" id="user">
  <thead>
    <tr>
      <th scope="col">S.No</th>
      <th scope="col">User Name</th>
      <th scope="col">Password</th>
	  <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
										$query2 = "SELECT * FROM profile";
										$query_run2 = mysqli_query($db, $query);

										if(mysqli_num_rows($query_run) > 0)
										{
											$sn=1;
											foreach($query_run as $student2)
											{
                                    ?>
  
											<tr>
											  <td><?php echo $sn;?></td>
											  <td><?= $student2['fname'] ?></td>
											  <td><?= $student2['lname'] ?></td>
											  <td>
													<form action='delete.php' method="post">
														<input type="hidden" name="fname" value="<?= $student2['fname']; ?>">
														<input type="submit" class="btn btn-danger" name="submit" value="Delete">
													</form>
											  </td>
											</tr>
									 <?php
											
											$sn=$sn+1;
											}
                            }
                            ?>
  </tbody>
</table>

        <!--===== Registration Form ============-->

        </div>
        <div class="col-sm-8">

        </div>
    </div>
 
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="login.js"></script>
</body>
</html>