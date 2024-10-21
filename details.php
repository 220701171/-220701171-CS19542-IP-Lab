<?php
include "db.php"; // Ensure db.php has the correct connection details

// Collect form data
$username = $_POST["username"];
$name = $_POST["name"]; // Collect the name field
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$item_type = $_POST["itemType"];
$condition = $_POST["condition"];

// Corrected Insert query using backticks for 'condition' and ensuring all fields are included
$sql = "INSERT INTO userdetails (username, name, email, phone, address, itemtype, `condition`) VALUES ('$username', '$name', '$email', '$phone', '$address', '$item_type', '$condition')";

// Start HTML output
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Message</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&family=Poppins:wght@600&display=swap">
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            margin-top: 100px;
        }
        .success-message {
            font-family: 'Poppins', sans-serif;
            font-size: 3rem;
            color: #28a745;
            font-weight: bold;
            display: none;
            background: #e8f5e9;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        }
        .confetti {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        .animated-message {
            color: #ff6347;
            font-size: 3.5rem;
            font-weight: bold;
            text-shadow: 3px 3px 5px #ffeb3b;
            animation: pop-in 0.5s ease-in-out forwards;
        }

        @keyframes pop-in {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<div class="confetti" id="confetti"></div>

<?php
if ($conn->query($sql) === TRUE) {
    echo "<div class='success-message animated-message' id='success-msg'>🎉 New record created successfully! 🎉</div>";
} else {
    echo "<div class='success-message' style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</div>";
}
$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const successMsg = document.getElementById('success-msg');
        if (successMsg) {
            // Display the message after a slight delay
            setTimeout(() => {
                successMsg.style.display = 'block';
                // Trigger confetti
                launchConfetti();
            }, 500);
        }
    });

    function launchConfetti() {
        var end = Date.now() + (15 * 1000);

        // Confetti color options
        var colors = ['#ff0a54', '#ff477e', '#ff7096', '#ff85a1', '#ff96c9', '#ff80c7'];

        (function frame() {
            // Launch confetti at random positions
            confetti({
                particleCount: 5,
                angle: 60,
                spread: 70,
                origin: { x: Math.random(), y: Math.random() - 0.2 },
                colors: colors,
            });
            confetti({
                particleCount: 5,
                angle: 120,
                spread: 70,
                origin: { x: Math.random(), y: Math.random() - 0.2 },
                colors: colors,
            });

            // Continue launching until the time is up
            if (Date.now() < end) {
                requestAnimationFrame(frame);
            }
        })();
    }
</script>
</body>
</html>
