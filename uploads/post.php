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
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}

td, th {
  border: 1px solid #0000;
  text-align: left;
  padding: 8px;
}
body{
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
        <a class="nav-link" href="welcome.php"> GO BACK TO LOGIN PAGE</a>
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


<?php
$user=$_SESSION["user"];
$query=("select * from user where user='$user'");
$result=mysqli_query($conn , $query);
$row=mysqli_fetch_array($result);
$id=$row["id"];
$query2=("select * from post where user_id='$id' ");
$result2=mysqli_query($conn , $query2);
$row1=($query2);
$result3=mysqli_num_rows($result2);


?>

<style>
table {
border: 50%;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 18px;
text-align: left;
padding: 5px;
}
th {
background-color:#64C2C2	;
color: white;
}
table , th ,td {
  border: 1px solid black;
}
</style>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for party position.." title="Type in a name"><br><br><br>
<table id="myTable">
<tr>
<th><i>SL/NO</i></th>
<th><i>NAME</i></th>
<th><i>DESIGNATION</i></th>
<th><i>PARTY POSITION</i></th>
<th><i>MOBILE NUMBER</i></th>
<th><i>WARD</i></th>
<th><i>OTHER</i></th>

</tr>
<?php
for($i=1;$i<=$result3;$i++)
{
	  $row=mysqli_fetch_array($result2);
	  
?>
<tr>
<td><?php echo $row["id"] ?></td>
<td><?php echo $row["name"] ?></td>
<td><?php echo $row["desg"] ?></td>
<td><?php echo $row["party"] ?></td>
<td><?php echo $row["phone"] ?></td>
<td><?php echo $row["ward"] ?></td>
<td><?php echo $row["other"] ?></td>

</tr>

<?php
}
?>
</table></div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

