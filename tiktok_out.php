<?php
include 'data_pendapat.php';

$sql = "SELECT * FROM test1";
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTP-8">
    <title>View Users</title>
    <link rel="stylesheet" href="style1.css"
    <script src="script.js"> </script>
</head>
<body>
<div class="container">
    <h2> Request List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>TikTok</th>
            <th>Song</th>
            <th>Diff</th>
            <th>Action</th>
        </tr>
<?php if (!empty($users)): ?>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= htmlspecialchars($user['id']) ?></td>
        <td><?= htmlspecialchars($user['name']) ?></td>
        <td><?= htmlspecialchars($user['song']) ?></td>
        <td><?= htmlspecialchars($user['diff']) ?></td>
        <td>
            <a href="tiktok_up.php?id=<?= htmlspecialchars($user['id']) ?>" class ="button">Edit</a>
            <a href="tiktok_del.php?id=<?= htmlspecialchars($user['id']) ?>" class ="button" onclick="return confirmDelete()">Next</a>
        </td>
    </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="S">No Users found.</td>
    </tr>
<?php endif; ?>
    </table>
</div>
</body>
</html>