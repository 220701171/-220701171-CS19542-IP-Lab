<?php
include('dbconn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errors)) {
    $EMPID = $_POST["EMPID"];
    $Name = $_POST["Name"];
    $Designation = $_POST["Designation"];
    $Salary = $_POST["Salary"];

    $sql = "INSERT INTO emp (EMPID, Name,Designation,Salary) VALUES ('$EMPID', '$Name', '$Designation', '$Salary')";

    if ($conn->query($sql) === TRUE) {
        echo "New account created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
