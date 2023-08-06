<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $childFirstName = $_POST["child_first_name"];
    $childMiddleName = $_POST["child_middle_name"];
    $childLastName = $_POST["child_last_name"];
    $childAge = intval($_POST["child_age"]);
    $gender = $_POST["gender"];
    $differentAddress = isset($_POST["different_address"]) ? 1 : 0;
    $childAddress = $_POST["child_address"];
    $childCity = $_POST["child_city"];
    $childState = $_POST["child_state"];
    $country = $_POST["country"];
    $childZipCode = $_POST["child_zip_code"];

    // Connect to the database (replace placeholders with actual credentials)
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "teacher";

    $conn = new mysqli('localhost', 'root', 'root', 'teacher');


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL statement to insert data
    $stmt = $conn->prepare("INSERT INTO children (first_name, middle_name, last_name, age, gender, different_address, address, city, state, country, zip_code)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisissssi", $childFirstName, $childMiddleName, $childLastName, $childAge, $gender, $differentAddress, $childAddress, $childCity, $childState, $country, $childZipCode);

    if ($stmt->execute()) {
        echo "Data saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
