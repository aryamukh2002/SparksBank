<?php
$connection = mysqli_connect("localhost", "root", "", "banking");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$sender = $_POST['sender'];
$recipient = $_POST['recipient'];
$amount = floatval($_POST['amount']);

$query = "SELECT balance FROM users WHERE name = '$sender'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $sender_balance = $row['balance'];

    if ($sender_balance >= $amount) {
        if($amount>=0){
            // Update sender's balance
        $new_sender_balance = $sender_balance - $amount;
        $query = "UPDATE users SET balance = $new_sender_balance WHERE name = '$sender'";
        mysqli_query($connection, $query);

        // Update recipient's balance
        $query = "UPDATE users SET balance = balance + $amount WHERE name = '$recipient'";
        mysqli_query($connection, $query);

        // Record the transaction
        $query = "INSERT INTO transactions (sender, recipient, amount) VALUES ('$sender', '$recipient', $amount)";
        mysqli_query($connection, $query);
        
            echo '<script>';
        echo 'alert("Transaction successful!");'; // You can customize the message inside the alert.
        echo '</script>';
        }
        else{
            echo "<h1>Invalid amount</h1>";
        }
        
        
        
    } else {
        echo "Insufficient balance.";
    }
} else {
    echo "Sender not found.";
}

mysqli_close($connection);
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


button {
    margin-left: 42dvw;
    background-color: #33ccff; /* Light Blue */
    color: #1e1e1e; /* Dark Background */
    border: none;
    padding: 12px 24px;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    font-family: 'Young Serif';
}

button:hover {
    background-color: #66ff99; /* Neon Green */
    transform: scale(1.05); /* Slight scale-up on hover */
}


a{
    text-decoration: none;
}
/* Add more futuristic styles as needed */

    </style>

</head>
<body>
    <br>
    <br>
    <h1>Thanks for banking with us !! </h1>
    <br>
    <br>
    <button>
    <a href="index.php">Back to Money Transfer</a>
    </button>
    
</body>
</html>