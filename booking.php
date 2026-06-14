<?php
// booking.php

// Enable error reporting (for development only)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection info
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

// Create connection
$conn = new mysqli('localhost','root', '', 'hotel_db');

// Check connection
if ($conn->connect_error) {
  die("<h2 style='color:red;'>Connection failed: " . $conn->connect_error . "</h2>");
}

// Check if form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $checkin = $_POST["checkin"] ?? '';
  $checkout = $_POST["checkout"] ?? '';
  $guests = $_POST["guests"] ?? '';

  // Validate inputs
  if (empty($checkin) || empty($checkout) || empty($guests)) {
    $message = "<p style='color:red;'>All fields are required!</p>";
  } elseif ($checkout <= $checkin) {
    $message = "<p style='color:red;'>Check-out date must be after check-in date.</p>";
  } else {
    // Prepare statement
    $stmt = $conn->prepare("INSERT INTO bookings (checkin, checkout, guests) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $checkin, $checkout, $guests);

    if ($stmt->execute()) {
      $message = "<p style='color:green;'>Booking successful! Thank you for choosing Hotel Silverpeak.</p>";
    } else {
      $message = "<p style='color:red;'>Error: " . htmlspecialchars($stmt->error) . "</p>";
    }
    $stmt->close();
  }
} else {
  $message = "<p style='color:red;'>Invalid request method.</p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Booking Status - Hotel Silverpeak</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background: #f7f7f7;
      padding: 2rem;
      text-align: center;
    }
    .message-box {
      background: white;
      max-width: 600px;
      margin: 2rem auto;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    a.back-link {
      display: inline-block;
      margin-top: 1.5rem;
      text-decoration: none;
      font-weight: 600;
      color: #333;
      border: 1px solid #333;
      padding: 0.5rem 1.5rem;
      border-radius: 4px;
      transition: background 0.3s, color 0.3s;
    }
    a.back-link:hover {
      background: #333;
      color: white;
    }
  </style>
</head>
<body>
  <div class="message-box">
    <?php echo $message; ?>
    <a href="index.html" class="back-link">← Back to Home</a>
  </div>
</body>
</html>
