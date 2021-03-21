<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'reg');

// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}
if(isset($_REQUEST["submit"]))
{
	  $user=$_REQUEST["user"];
	  $pass=$_REQUEST["pass"];
	 
	  $query=("select * from user where user='$user' && pass='$pass' ");
	  $result=mysqli_query($conn , $query);
	  while ($row = mysqli_fetch_assoc($result)) {
		    $_SESSION["user"]=$user;
		   header('location:welcome.php');
	  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP login system!</title>
   <style>body{
     background-image:url("image5.jpg");
     } </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <a class="navbar-brand" href="#"> <img src="image3.jpeg"></a>
  <a class="navbar-brand" href="#">Hubli/Dharwad <i><b>(AAP)</b></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav"><li class="nav-item active">
        <a class="nav-link" href="frontpage.php"> HOME  <span class="sr-only"></span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#"> WARD PRESIDENT LOGIN <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-4">

<h3><b>WARD PRESIDENT LOGIN HERE  :</b><hr> </h3><br><br><br>



<h3><form method="post">
<table border="10px" align="center">
<tr>
<td><b><i>USERNAME :</i></b></td>
<td><input type="text" name="user"class="form-control"> </div></td>

</tr>
<tr>
<td><b><i>PASSWORD :</b></i></td>
<td><div class="form-group"><input type="text" name="pass" class="form-control"> </div></td>

</tr>
<tr>
<td><b><i>WARD :</b></i></td>
<td>
<div class="form-group">
    
    <input type="number" name="ward"  min="0" max="82" class="form-control" id="ward" placeholder="select ward ">
  </div>
</td>
</tr>

<tr>
<td colspan="2" align="center"><input type="submit" value="Login" name="submit"class="btn btn-info"></td>


</table>
</form></h5>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
