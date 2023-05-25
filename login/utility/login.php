<?php
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $database = "crud_operations";

    // Create a connection
    $con = new mysqli($servername, $username, $password, $database);

    // Check the connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    // Retrieve email and password from the form submission
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Perform further operations with the email and password
        $stmt = $con->prepare("SELECT * FROM utenti WHERE email = ?");

        // Method that uses a prepared statement and parameter binding to safely pass the $email value to the SQL query.
        $stmt->bind_param("s", $email);

        // Execute the prepared statement
        $stmt->execute();

        // Get the result set from the executed statement
        $result = $stmt->get_result();

        // Get the number of rows in the result set
        $rows = $result->num_rows;

        // Check if there is at least one matching row
        if ($rows > 0) {
            // Loop through the result set
            while ($row = $result->fetch_assoc()) {
                // Check if the submitted password matches the stored password
                if ($row['password'] === $password) {
                    // Start a session and store the user's ID in the session variable
                    session_start();
                    $_SESSION['id'] = $row['id'];

                    // Redirect to the welcome page upon successful login
                    header("location: ../welcome.php");
                }
            }
            header("location: ../index.php");
        } else {
            // Redirect to the index page if the login fails
            header("location: ../index.php");
        }

        // Close the prepared statement
        $stmt->close();
    }

    // Close the connection
    $con->close();
?>
