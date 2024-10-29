<?php
session_start();
$conn = new mysqli("localhost", "root", "root", "faculty_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve data from the 'final_faculty_allocation' table
$sql = "SELECT date, slot, name FROM final_faculty_allocation";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Final Faculty Allocation Table</title>
</head>
<body>
    <h1>Final Faculty Allocation Table</h1>

    <table border="1">
        <tr>
            <th>Date</th>
            <th>Slot</th>
            <th>Assigned Faculty Names</th>
        </tr>

        <?php
        // Check if there are any rows in the result
        if ($result && $result->num_rows > 0) {
            // Fetch each row and display it in the table
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["date"] . "</td>";
                echo "<td>" . $row["slot"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "</tr>";
            }
        } else {
            // Display a message if no data is found
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }
        ?>

    </table>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
