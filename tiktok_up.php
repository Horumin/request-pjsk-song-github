<?php
include 'data_pendapat.php'; // Include database connection

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the user record with the provided id
    $sql = "SELECT * FROM test1 WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // If the user is not found, redirect to read.php or show an error
    if (!$user) {
        header("Location: tiktok_out.php");
        exit();
    }
} else {
    // Redirect if 'id' parameter is missing
    header("Location: tiktok_out.php");
    exit();
}

// Update the user if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $song = $_POST['song'];
    $diff = $_POST['diff'];

    $sql = "UPDATE test1 SET name = :name, song = :song, diff = :diff, WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'song' => $song, 'diff' => $diff, 'id' => $id]);

    header("Location: tiktok_out.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="style1.css">
    <script src="script.js"></script>
</head>
<body>
<div class="container">
    <h2>Edit User</h2>
    <form name="userForm" action="" method="POST" onsubmit="return validateForm()">
        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required><br>
        <label>Song:</label>
        <input type="text" name="song" value="<?= htmlspecialchars($user['song']) ?>" required><br>
        <label for="diff">Tingkat Kesulitan:</label>
        <select id="diff" name="diff">
            <option value="Easy">Easy</option>
            <option value="Normal">Normal</option>
            <option value="Hard">Hard</option>
            <option value="Extreme">Extreme</option>
            <option value="Master">Master</option>
            <option value="Append">Append</option>
        </select>
        <input type="submit" value="Update User">
    </form>
</div>
</body>
</html>