
<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 80%;
color: black;
font-family: monospace;
font-size: 18px;
text-align: left;
}
table{
	height: 80%
	width:80%;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<center>
<h1>Registration Data</h1>
<h2>Participants List</h2><br><br>
</center>
<style>
table th td
{
 font-size:14px;
}
</style>
<style>
table {
  border-collapse: collapse;
  border: 1px solid black;
} 

th,td {
  border: 1px solid black;
}

table.a {
  table-layout: auto;
  width: 180px;  
}

table.b {
  table-layout: fixed;
  width: 180px;  
}

table.c {
  table-layout: auto;
  width: 100%;  
}

table.d {
  table-layout: fixed;
  width: 100%;  
}
</style>
<table border=1 class="a">
<tr>
<th>ID</th>
<th>Email</th>
<th>Name</th>
<th>Mobile</th>
<th>College</th>
<th>Roll</th>
<th>Team Name</th>
<th>Team Size</th>
<th>Innovation</th>
<th>Problem Code</th>
<th>PPT Link</th>
<th>Code Link</th>
<th>Video Link</th>
</tr>
<?php
$conn = mysqli_connect('127.0.0.1', 'jdmf9z4zrge5', '5i<jnmoJ%Uhv7', 'test_sample');

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT  id, email, name,  mobile, college,roll, tname, tsize, inno, pcode,ppt, code, video2  FROM registration_data";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>".$row["id"]."</td><td>".$row["email"]."</td><td>".$row["name"]."</td><td>". $row["mobile"]."</td><td>".$row["college"]."</td><td>".$row["roll"]."</td><td>".$row["tname"]."</td><td>".$row["tsize"]."</td><td>".$row["inno"]."</td><td>".$row["pcode"]."</td><td>".$row["ppt"]."</td><td>".$row["code"]."</td><td>".$row["video2"]."</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>

</body>
</html