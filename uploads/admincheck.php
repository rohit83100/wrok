<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: admin.php");
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
     background-color:#F4F1F1	;
}</style>
    <script src="table2excel.js"></script>
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
        <a class="nav-link" href="frontpage.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="adminlogout.php">Logout</a>
      </li>
   </ul>
  </div>
</nav>

<style>
table {
border:1px ;
width: 100%;
color: black;
font-family: monospace;
font-size: 25px;
text-align: center;
}
th {
background-color:#64C2C2;
color: black;
} 
table , th ,td {
  border: 1px solid black;
}

</style><br> <h5> <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for party position.." title="Type in a name">
<button id="export">Export to excel</button><br></h5>

<table id="myTable"  data-excel-name="A very important table">
<tr>
<th><i>SL/NO</i></th>
<th><i>NAME</i></th>
<th><i>DESIGNATION</i></th>
<th><i>PARTY POSITION</i> </th>
<th><i>MOBILE NUMBER</i></th>
<th><i>WARD</i></th>
<th><i>OTHERS</i></th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "reg");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, name, desg, party, phone, ward, other FROM post";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"] . "</td><td>". $row["desg"]. "</td><td>" . $row["party"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["ward"] . "</td><td>" . $row["other"] . "</td></tr>";
}
} else { echo "0 results"; }
$conn->close();
?>
</table>
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

<script>
  var table2excel = new Table2Excel();

  document.getElementById('export').addEventListener('click', function() {
    table2excel.export(document.querySelectorAll('table'));
  });
</script>

 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
