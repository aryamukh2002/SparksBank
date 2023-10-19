<?php
$connection = mysqli_connect("localhost", "root", "", "banking");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT id,name, balance FROM users"; // Adjust column names as needed
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Error in SQL query: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Balances</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Young+Serif&display=swap" rel="stylesheet">
    <style>
        /* Updated CSS styles for a colorful and futuristic user balance page */
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

        table {
            margin: 20px auto;
            max-width: 600px;
            border-collapse: collapse;
            border: 1px solid #555;
            background-color: rgba(20, 20, 20, 0.8); /* Slightly transparent dark background */
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        table th, table td {
            border: 1px solid #555;
            padding: 12px;
            text-align: left;
            background-color: #333; /* Dark Gray */
            color: #66ff99; /* Neon Green */
        }

        /* Additional futuristic styles */
        button {
            height: 10dvh;
            background-color: #33ccff; /* Light Blue */
            color: #1e1e1e; /* Dark Background */
            border: none;
            padding: 0px 24px;
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
        .buttons{
                display: flex;
                justify-content: center;
                align-items: center;
                
            margin: 0;
}
        /* Add more futuristic styles as needed */
    </style>
</head>
<body>
    <h1>User Balances</h1>
    <table border='1'>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Balance</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['balance'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <div class="buttons">
        <button>

            <h2><a href="history.php">Transaction History</a></h2>
        </button>
    
    </div>
        <br>
      <div class="buttons">
      <button>
    <a href="index.html">Back to Money Transfer</a>
    </button>

    </div>
    <br>
    <div class="buttons">
        <button>
    
            <h2><a href="index.html">HOME</a></h2>
        </button>

    </div>
</body>
</html>

<?php
mysqli_close($connection);
?>
