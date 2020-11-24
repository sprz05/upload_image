<html>
<head>
<title>Study Bots Ideas</title>
<style type="text/css">
html, table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

img{
	height:400px;
	width:400px;
}
</style>
</head>
<body>
<h1>Study Bot Maker Admin</h1>

<?php 

    $db = mysqli_connect("localhost", "root", "", "photos");
	$sqlget = "SELECT * FROM images";
	$sqldata = mysqli_query($db, $sqlget) or die('error getting data');

echo "<table>";
echo "<tr><th>ID</th><th>Image</th><th>text</th></tr>";

while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)){
	echo "<tr><td>";
	echo $row['id'];
    echo "</td><td>";
    echo "<img src='images/".$row['image']."'>"; 
    echo "</td><td>";
    echo $row['text'];
    echo "</td></tr>";
}

echo "</table>";

?>

</body>
</html>