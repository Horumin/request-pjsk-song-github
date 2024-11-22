<?php
include 'data_pendapat.php';

$id = $_GET['id'];
$sql = "DELETE FROM test1 WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

header("Location: tiktok_out.php");
exit();
?>
<?php
include 'data_pendapat.php';

$id = $_GET['id'];
$sql = "DELETE FROM test1 WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

header("Location: tiktok_out.php");
exit();
?>