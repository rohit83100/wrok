
<div class="container mt-4">
<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'reg');
$id ="";
$name = "";
$desg = "";
$party = "";
$phone = "";
$ward = "";
$other = "";

// Try connecting to the Database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($conn == false){
    dir('Error: Cannot connect');
}
if($_SESSION["user"]==true)
{
echo ".";
}
else
{
	 header('location:index.php');
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
    <style>

table {
border:1px ;
width: 100%;
color: black;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: lightblue;
color: black;
} 
table , th  {
  border: 3px solid black;
}
button {
    background-color:lightblue;
    color:lightblue;
}body{
     background-color:#F4F1F1	;
}
</style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-info">
  
 
        <a class="navbar-brand" href="#"> <img src="image3.jpeg"></a>
    
  <a class="navbar-brand" href="#"><b><h3>HUBLI/DHARWAD <i>(AAP)</h3></b></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="frontpage.php">HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">LOGOUT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="post.php">VIEW POST</a>
      </li>

      
     
    </ul>
  <div class="navbar-collapse collapse">
  <ul class="navbar-nav ml-auto">
  <li class="nav-item active">
        <a class="nav-link" href="#"> <img src="https://img.icons8.com/metro/26/000000/guest-male.png"> <?php echo "Welcome ". $_SESSION['user']?></a>
      </li>
  </ul>
  </div>


  </div>
</nav>

<div class="container mt-4">
<h3><b><?php echo "WELCOME ". $_SESSION['user']?> NOW YOU CAN USE THIS PAGE :</b></h3>
<hr>










<?php
$user=$_SESSION["user"];
$query=("select * from user where user='$user'");
$result=mysqli_query($conn , $query);
$row=mysqli_fetch_array($result);
$id=$row["id"];
if(isset($_REQUEST["submit"]))
{
	  $name=$_REQUEST["name"];
	  $desg=$_REQUEST["desg"];
	  $party=$_REQUEST["party"];
	  $phone=$_REQUEST["phone"];
	  $ward=$_REQUEST["ward"];
	  $other=$_REQUEST["other"];
	 $query1= ("insert into `post`(`name` ,`desg`,`party`,`phone`,`ward`,`other`,`user_id`)value('$name','$desg', '$party','$phone','$ward','$other','$id')");
	
	 if(mysqli_query($conn, $query1)){
        echo "New record inserted sucessfully";
    }else{
        echo "unable to insert";
    }
}

?>

<?php include('search.php');?>
</div>

<p><form action="welcome.php"method="post">

<table border="50">


<tr>
   <input type="number" name="id" placeholder="search by sl/no" value="<?php echo $id;?>">
   <!-- Input For Find Values With The given ID -->
   <button> <input type="submit" name="search" value="Find"></button> <br> <br> <br> <br> 
    <td><b><i>NAME :</i></b></td>
    <td><input type="text" name="name" value="<?php echo $name;?>" ></td>
   </tr>
   <tr>
    <td><b><i>DESIGNATION :</i></b></td>
    <td><input type="text" name="desg"  value="<?php echo $desg;?>" ></td>
   </tr>
   <tr>
    <td><b><i> PARTY POSITION :</i></b></td>
    <td>
     <input type="text" name="party" value="<?php echo $party;?>"  >
    </td>
   </tr>
   
   <tr>
    <td><b> <i>MOBILE NUMBER :</i></b></td>
    <td>
     <input type="phone" name="phone"  value="<?php echo $phone;?>" >
    </td>
   </tr>
   <tr>
    <td><b> <i>WARD :</i></b></td>
    <td><input type="number" name="ward"  min="0" max="82"  value="<?php echo $ward;?>" ></td>
   </tr> 
    <tr>
    <td><b> <i>OTHER :</i></b></td>
    <td><input type="text" name="other" value="<?php echo $other;?>" ></td>
   </tr> 
   <tr>
    <td><h5><button> <input type="submit" name= "submit" value="Submit" ></button></h5> </td>
    <!-- Input For Edit Values -->
               <td> <button> <input type="submit" name="update" value="EDIT"> </button> 
                
                <!-- Input For Clear Values -->
               <button>  <input type="submit" name="delete" value="Delete"> </button>
                 </td></tr>

</table>

</form></p>


<a href="post.php">View Post</a>

