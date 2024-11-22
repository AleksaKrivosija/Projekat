<?php 
if(isset($_POST['username']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['message'])) {
    $username = $_POST['username'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $conn = new mysqli('localhost', 'root', '', 'projekat');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare('INSERT INTO registration (username, surname, email, message) VALUES (?, ?, ?, ?)');
        if ($stmt) {
            $stmt->bind_param('ssss', $username, $surname, $email, $message);
            if ($stmt->execute()) {
                echo "Registration successful";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error in preparing statement: " . $conn->error;
        }
        $conn->close();
    }
} 
if(isset($_POST['submit'])){
    $conn = new mysqli('localhost', 'root', '', 'projekat');
    $search = $_POST['search'];

    $stmt = $conn->prepare("SELECT * FROM workers WHERE ime LIKE ?");
    $searchTerm = "%$search%";
    $stmt->bind_param('s', $searchTerm);
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo "<br><br><br>";
            echo "<div style='text-align: center;'>";
            echo "<table style='border: 1px solid black; margin: auto;'>"; 
            echo "<tr><th style='border: 1px solid black;'>ID</th><th style='border: 1px solid black;'>Ime</th><th style='border: 1px solid black;'>Email</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td style='border: 1px solid black;'>".$row['id']."</td>";
                echo "<td style='border: 1px solid black;'>".$row['ime']."</td>";
                echo "<td style='border: 1px solid black;'>".$row['Email']."</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";
        } else {
            echo "Nema rezultata za uneti pojam.";
        }
    } else {
        echo "Greška pri izvršavanju upita: " . $stmt->error;
    }

    $stmt->close();
}
?>



