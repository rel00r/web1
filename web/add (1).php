<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "directions";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $data = $_POST['button'];

    $sql = "INSERT INTO dir (buttons)VALUES ('$data')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "SELECT buttons FROM dir ORDER BY id DESC LIMIT 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            session_start();
            $_SESSION["lastInsertedValue"] = $row["buttons"];
        }
    } else {
        echo "No results";
    }

    $conn->close();

    header("Location: index.html");
?>
