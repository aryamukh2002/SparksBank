<?php
$connection = mysqli_connect("localhost", "root", "", "banking");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM transactions";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Error in SQL query: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaction History</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Young+Serif&display=swap" rel="stylesheet">
    <style>
        /* Updated CSS styles for a colorful and futuristic transaction page */
body {
    font-family: 'Roboto', sans-serif;
    background-color: #0e0e0e; /* Dark Background */
    color: #ffffff;
    margin: 0;
    padding: 0;
}

h1 {
    color: #33ccff; /* Light Blue */
    font-size: 28px;
    text-align: center;
    font-family: 'Young Serif';
}

form {
    margin: 20px auto;
    max-width: 600px;
    padding: 30px;
    background-color: rgba(20, 20, 20, 0.8); /* Slightly transparent dark background */
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    text-align: center;
}

table {
    margin-left: 25dvw;
    width: 50%;
    border-collapse: collapse;
    border: 1px solid #555;
    background-color: rgba(20, 20, 20, 0.8); /* Slightly transparent dark background */
}

table th, table td {
    border: 1px solid #555;
    padding: 12px;
    text-align: left;
    background-color: #333; /* Dark Gray */
    color: #66ff99; /* Neon Green */
}

button {
    
    background-color: #33ccff; /* Light Blue */
    color: #1e1e1e; /* Dark Background */
    border: none;
    height: 8dvh;
    padding: 1px 12px;
    
    font-size: 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    font-family: 'Young Serif';
}

button:hover {
    background-color: #66ff99; /* Neon Green */
    transform: scale(1.05); /* Slight scale-up on hover */
}
.buttons{
    display: flex;
    justify-content: center;
    align-items: center;
    
            margin: 0;
}

input[type="text"],
input[type="number"] {
    background-color: #555; /* Gray */
    color: #ffffff;
    border: none;
    padding: 10px;
    border-radius: 5px;
    width: 100%;
    font-size: 16px;
    transition: background-color 0.3s ease;
}
input[type="submit" i]:hover{
    cursor: pointer;
    background-color: #66ff99; /* Neon Green */
    transform: scale(1.55); /* Slight scale-up on hover */
}

input[type="text"]:focus,
input[type="number"]:focus {
    background-color: #333; /* Dark Gray */
    outline: none;
}

/* Additional futuristic styles */
.payment-method {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
}

.payment-method label {
    margin-right: 10px;
    font-size: 16px;
    color: #ffffff;
}

.payment-method select {
    background-color: #555; /* Gray */
    color: #ffffff;
    border: none;
    padding: 8px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}
a{
    text-decoration: none;
}
/* Add more futuristic styles as needed */

    </style>

</head>
<body>
    <h1>Transaction History</h1>
    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Sender</th>
            <th>Recipient</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['sender'] . "</td>";
            echo "<td>" . $row['recipient'] . "</td>";
            echo "<td>" . $row['amount'] . "</td>";
            echo "<td>" . $row['transaction_date'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <div class="buttons">
    <button>
    <a href="index.php">Back to Money Transfer</a>
    </button>
    </div>
    
    <br>
    <div class="buttons">
        <button>
    
            <h2><a href="index.html">HOME</a></h2>
        </button>

    </div>
    <br>
</body>
</html>

<?php
mysqli_close($connection);
?>
