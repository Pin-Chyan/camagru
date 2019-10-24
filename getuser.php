<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
require("init.php");

$q = intval($_GET['q']);

// $con = mysqli_connect('localhost','peter','abc123','my_db');
$con = Call_onee_san();
$sql= $con->prepare("SELECT * FROM users WHERE id = '".$q."'");
$sql->execute();
// $result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>id</th>
<th>username</th>
<th>email</th>
</tr>";
while($row = $sql->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    // echo "<td>" . $row['display'] . "</td>";
    echo "</tr>";
}
echo "</table>";
$con = NULL;
?>
</body>
</html>