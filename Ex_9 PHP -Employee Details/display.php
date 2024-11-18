<?php
include('dbconn.php');

$sql = "SELECT * FROM emp";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Employee ID: " . $row["EMPID"]. "  Employee Name: " . $row["Name"]."  Designation: " . $row["Designation"]. "  Salary: " . $row["Salary"].  "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
